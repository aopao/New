<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

/**
 * Class CategoryServices
 *
 * @package App\Services
 */
class CategoryServices
{
	/**
	 * @var CategoryRepository
	 */
	private $categoryRepository;
	
	/**
	 * CategoryServices constructor.
	 *
	 * @param CategoryRepository $categoryRepository
	 */
	public function __construct(CategoryRepository $categoryRepository)
	{
		$this->categoryRepository = $categoryRepository;
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAll()
	{
		return $this->categoryRepository->getAll();
	}
	
	public function getById($id)
	{
		return $this->categoryRepository->getById($id);
	}
	
	/**
	 * @return array
	 */
	public function getSingleTreeArray()
	{
		$tree = new TreeServices();
		$data = $this->categoryRepository->getAll()->toArray();
		return $tree->makeTreeForHtml($data);
	}
	
	/**
	 * @return array
	 */
	public function getSingleListTreeArray()
	{
		$tree = new TreeServices();
		$data = $this->categoryRepository->getAll()->toArray();
		$data = $tree->makeTreeForHtml($data);
		foreach ($data as &$value) {
			$value[ 'name' ] = str_repeat("├─ " , $value[ 'level' ]) . $value[ 'name' ];
		}
		return $data;
	}
	
	
	/**
	 * @param $data
	 * @return bool
	 */
	public function store($data)
	{
		if ($this->categoryRepository->store($data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function update($data)
	{
		
		$id = $data[ 'id' ];
		if ($data[ 'parent_id' ] == $data[ 'id' ]) {
			unset($data[ 'parent_id' ]);
		}
		unset($data[ '_token' ] , $data[ '_method' ]);

		if ($this->categoryRepository->update($id , $data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	/**
	 * @param $id
	 * @return int
	 */
	public function getSonNum($id)
	{
		$categorySon = $this->categoryRepository->getSonById($id);
		return count($categorySon);
	}
	
	/**
	 * @param $id
	 * @return bool|int
	 */
	public function destroy($id)
	{
		$categorySon = $this->getSonNum($id);
		if ($categorySon > 0) {
			return $categorySon;
		}
		
		if ($this->categoryRepository->destroy($id)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}