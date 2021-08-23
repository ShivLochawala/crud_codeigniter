<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookModel;

class BookController extends BaseController
{
	public function index(){
		$books = new BookModel;
		$data = [];
		$data['books'] = $books->orderBy('id', 'DESC')->findAll();
		$data['title'] = 'Book Listing';
		echo view('Books/list',$data);
	}
	public function create(){
		helper('form');
		$data = [];
		if($this->request->getMethod() == 'post'){
			$input = $this->validate([
				'name' => 'required|min_length[5]',
				'author' => 'required|min_length[5]',
				'isbn_no' => 'required|numeric|min_length[3]'
			]);
			if($input == true){
				$books = new BookModel;
				$data = [
					'title' => $this->request->getPost('name'),
					'isbn_no'  => $this->request->getPost('isbn_no'),
					'author'  => $this->request->getPost('author')
				];
				$save = $books->insert($data);
				return redirect()->to('/books');
			}else{
				$data['validation'] = $this->validator;
			}
		}
		
		$data['title'] = 'Add Book';
		echo view('Books/add',$data);
	}
	public function edit($id=null){
		helper('form');
		$data = [];
		if($this->request->getMethod() == 'post'){
			$input = $this->validate([
				'name' => 'required|min_length[5]',
				'author' => 'required|min_length[5]',
				'isbn_no' => 'required|numeric|min_length[3]'
			]);
			if($input == true){
				$books = new BookModel;
				$data = [
					'title' => $this->request->getPost('name'),
					'isbn_no'  => $this->request->getPost('isbn_no'),
					'author'  => $this->request->getPost('author')
				];
				$save = $books->update($id,$data);
				return redirect()->to('/books');
			}else{
				$data['validation'] = $this->validator;
			}
		}
		$model = new BookModel();
		$book = $model->where('id', $id)->first();   
		if(empty($book)){
			return redirect()->to('/books');
		}
		$data['book'] = $book;
		$data['title'] = 'Edit Book';
		echo view('Books/edit',$data);
	}
	public function delete($id = null){
     	$model = new BookModel();
     	$data['user'] = $model->where('id', $id)->delete();
     	return redirect()->to('/books');
    }

}
