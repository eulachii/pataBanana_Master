<?php
class Controller_Admin_Soils extends Controller_Admin
{

	public function action_index()
	{
		$data['soils'] = Model_Soil::find('all');
		$this->template->title = "Soils";
		$this->template->content = View::forge('admin/soils/index', $data);

	}

	public function action_view($id = null)
	{
		$data['soil'] = Model_Soil::find($id);

		$this->template->title = "Soil";
		$this->template->content = View::forge('admin/soils/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Soil::validate('create');

			if ($val->run())
			{
				$soil = Model_Soil::forge(array(
					'type' => Input::post('type'),
					'description' => Input::post('description'),
					'image' => Input::post('image'),
				));

				if ($soil and $soil->save())
				{
					Session::set_flash('success', e('Added soil #'.$soil->id.'.'));

					Response::redirect('admin/soils');
				}

				else
				{
					Session::set_flash('error', e('Could not save soil.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Soils";
		$this->template->content = View::forge('admin/soils/create');

	}

	public function action_edit($id = null)
	{
		$soil = Model_Soil::find($id);
		$val = Model_Soil::validate('edit');

		if ($val->run())
		{
			$soil->type = Input::post('type');
			$soil->description = Input::post('description');
			$soil->image = Input::post('image');

			if ($soil->save())
			{
				Session::set_flash('success', e('Updated soil #' . $id));

				Response::redirect('admin/soils');
			}

			else
			{
				Session::set_flash('error', e('Could not update soil #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$soil->type = $val->validated('type');
				$soil->description = $val->validated('description');
				$soil->image = $val->validated('image');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('soil', $soil, false);
		}

		$this->template->title = "Soils";
		$this->template->content = View::forge('admin/soils/edit');

	}

	public function action_delete($id = null)
	{
		if ($soil = Model_Soil::find($id))
		{
			$soil->delete();

			Session::set_flash('success', e('Deleted soil #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete soil #'.$id));
		}

		Response::redirect('admin/soils');

	}

}
