<?php

namespace App\Controllers;

use App\Entities\Task;

class Tasks extends BaseController
{
	public $model;

	public function __construct()
	{
		$this->model = new \App\Models\TaskModel;
		
	}

	public function index()
	{
        
        $data = $this->model->findAll();
		
		return view("Tasks/index", ['tasks' => $data]);
	}
	
	public function show($id)
    {
		$task = $this->getTaskOr404($id);

		return view('Tasks/show', [
            'task' => $task
        ]);
	}

	public function new()
	{
		$task = new Task;

		return view('Tasks/new' , [
			'task' => $task
		]);
	}
	
	public function create()
	{
        $task = new Task($this->request->getPost());

		if ($this->model->insert($task)) {
			
			return redirect()->to("/appstarter/tasks/show/{$this->model->insertID}")
							->with('info', 'Task creared successfully');

							
		} else {
			return redirect()->to("/appstarter/tasks/new")
							 ->with('errors', $this->model->errors())
							 ->with('warning', 'Invalid date')
							 ->withInput();
		}
	}
	public function edit($id)
	{

		$task = $this->getTaskOr404($id);

		return view('Tasks/edit', [
			'task' => $task
		]);
	}
	public function update($id)
	{

		$task = $this->getTaskOr404($id);

		$task->fill($this->request->getPost());

		if ( ! $task->hasChanged()) {
			return redirect()->to("/appstarter/tasks/edit/$id")
							->with('warning', 'Nothing to update')
							->withInput();
		}

		if ($this->model->save($task)) {
			return redirect()->to("/appstarter/tasks/show/$id")
								->with('info', 'Task update successfully');
		} else {
            return redirect()->to("/appstarter/tasks/edit/$id")
							 ->with('errors', $this->model->errors())
							 ->with('warning', 'Invalid date')
							 ->withInput();
		}
	}

	public function delete($id)
	{
		$task = $this->getTaskOr404($id);

		if ($this->request->getMethod() === 'post') {

			$this->model->delete($id);

			return redirect()->to("/appstarter/tasks/")
							 ->with('info', 'Task delete');



		}
		return view('Tasks/delete', [
			'task' => $task
		]);
	}


	private function getTaskOr404($id)
	{
		$task = $this->model->find($id);
		
		if ($task === null) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException("Task with id $id not found");

		}
		return $task;
	}
}








