<?php

namespace App\Repositories;

use App\Models\Category;

/**
 * Class CategoryRepository
 *
 * @package App\Repositories
 */
class CategoryRepository
{
	/**
	 * @var Category
	 */
	private $category;
	
	/**
	 * CategoryRepository constructor.
	 *
	 * @param Category $category
	 */
	public function __construct(Category $category)
	{
		$this->category = $category;
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAll()
	{
		return $this->category->all();
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getTreeAll()
	{
		return $this->category->all();
	}
	
	/**
	 * @param $id
	 * @return mixed|static
	 */
	public function getById($id)
	{
		return $this->category->find($id);
	}
	
	/**
	 * @param $id
	 * @return CategoryRepository|mixed
	 */
	public function getParentById($id)
	{
		return $this->getById($id);
	}
	
	/**
	 * @param $id
	 * @return array
	 */
	public function getSonById($id)
	{
		return $this->category->where('parent_id' , $id)->get()->toArray();
	}
	
	/**
	 * @param array $data
	 * @return $this|\Illuminate\Database\Eloquent\Model
	 */
	public function store(array $data)
	{
		return $this->category->create($data);
	}
	
	public function update($id , $data)
	{
		return $this->category->where('id' , $id)->update($data);
	}
	
	/**
	 * @param $id
	 * @return int
	 */
	public function destroy($id)
	{
		return $this->category->destroy($id);
	}
}