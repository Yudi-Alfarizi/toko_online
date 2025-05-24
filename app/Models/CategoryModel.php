<?php namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table      = 'categories';
	protected $primaryKey = 'id';

	protected $returnType     = 'App\Entities\Category';

	protected $allowedFields = ['name', 'slug', 'parent_id'];

	protected $useTimestamps = true;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';

	protected $validationRules    = [
		'name'	=> 'required|min_length[3]',
	];

	protected $validationMessages = [
		'name' => [
			'required'   => 'Nama kategori wajib diisi.',
			'min_length' => 'Nama kategori minimal harus 3 karakter.',
		],
	];
	protected $skipValidation     = false;

	protected $beforeInsert = ['generateSlug'];

	protected function generateSlug(array $data)
	{
		$slug = strtolower(url_title($data['data']['name']));
		$name = trim($data['data']['name']);

		$category = $this->where('name', $name)->orderBy('id', 'DESC')->first();
		if ($category) {
			$slugs = explode('-', $category->slug);
			$slugNumber = !(empty($slugs[1])) ? ((int)$slugs[1] + 1) : 1;
			$slug = $slug . '-' . $slugNumber;
		}

		$data['data']['slug'] = $slug;

		return $data;
	}

	public function getParentOptions($exceptCategoryId = null)
	{
		$categories = [];

		$categoryModel = $this;
		if ($exceptCategoryId) {
			$categoryModel->where('id !=', $exceptCategoryId);
		}

		if ($results = $categoryModel->findAll()) {
			foreach ($results as $result) {
				$categories[] = [
					'id' => $result->id,
					'name' => $result->name,
					'slug' => $result->slug,
					'parent_id' => $result->parent_id,
					'created_at' => $result->created_at,
					'updated_at' => $result->updated_at,
				];
			}
		}

		return $categories;
	}

	// public function isDuplicate($name, $parentId, $excludeId = null)
	// {
	// 	$builder = $this->where('name', trim($name))
	// 		->where('parent_id', $parentId);

	// 	if ($excludeId !== null) {
	// 		$builder->where('id !=', $excludeId);
	// 	}

	// 	return $builder->first() !== null;
	// }

	public function getNestedCategories($level = 0)
	{
		$results = [];
		$categories = $this->where('parent_id', $level)
			->orderBy('name', 'asc')
			->findAll();

		if (count($categories) > 0) {
			foreach ($categories as $key => $category) {
				$results[$key] = $category->toArray();
				$results[$key]['children'] = $this->getNestedCategories($category->id);
			}
		}

		return $results;
	}

	public function getDescendantCategoryIds($parentId)
	{
		$descendants = [];

		$categories = $this->findAll();

		foreach ($categories as $category) {
			$id = is_array($category) ? $category['id'] : $category->id;
			$parent = is_array($category) ? $category['parent_id'] : $category->parent_id;

			if ($parent == $parentId) {
				$descendants[] = $id;
				$descendants = array_merge($descendants, $this->getDescendantCategoryIds($id));
			}
		}

		return $descendants;
	}
}