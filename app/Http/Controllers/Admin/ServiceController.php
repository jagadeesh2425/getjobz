<?php

namespace App\Http\Controllers\Admin;


use DB;
use Input;
use Redirect;
use App\Services;
use App\Helpers\MiscHelper;
use App\Helpers\DataArrayHelper;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DataTables;
use App\Http\Requests\ServiceFormRequest;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function indexServices()
    {
        return view('admin.services.index');
    }
    public function createServices()
    {
        return view('admin.services.add');
    }

    public function storeService(ServiceFormRequest $request)
    {
        $service = new Services();
        
        $service->service_title = $request->input('service_title');
        $service->service_description = $request->input('service_description');
        $service->service_price = $request->input('service_price');
        $service->service_num_days = $request->input('service_num_days');
        $service->service_num_listings = $request->input('service_num_listings');
        $service->service_for = $request->input('service_for');
        $service->save();

        /*         * ************************************ */

        flash('service has been added!')->success();
        return \Redirect::route('edit.service', array($service->id));
    }

    public function editService($id)
    {
        $services = Services::findOrFail($id);
        return view('admin.services.edit')
                        ->with('services', $services);
    }

    public function updateService($id, ServiceFormRequest $request)
    {
        $service = Services::findOrFail($id);
        
        $service->service_title = $request->input('service_title');
        $service->service_description = $request->input('service_description');
        $service->service_price = $request->input('service_price');
        $service->service_num_days = $request->input('service_num_days');
        $service->service_num_listings = $request->input('service_num_listings');
        $service->service_for = $request->input('service_for');
        
        $service->update();

        flash('Service has been updated!')->success();
        return \Redirect::route('edit.service', array($service->id));
    }

    public function deleteService(Request $request)
    {
        $id = $request->input('id');
        try {
            $service = Services::findOrFail($id);
            $service->delete();
            return 'ok';
        } catch (ModelNotFoundException $e) {
            return 'notok';
        }
    }

    public function fetchServicesData(Request $request)
    {
        $services = Services::select([
                    'services.id',
                    'services.service_title',
                    'services.service_description',
                    'services.service_price',
                    'services.service_num_days',
                    'services.service_num_listings',
                    'services.service_for',
        ])->orderBy('services.service_for');
        return Datatables::of($services)
                        ->filter(function ($query) use ($request) {


                            if ($request->has('service_title') && !empty($request->service_title)) {
                                $query->where('services.service_title', 'like', "%{$request->get('service_title')}%");
                            }

                            if ($request->has('service_description') && !empty($request->service_description)) {
                                $query->where('services.service_description', 'like', "%{$request->get('service_description')}%");
                            }

                            if ($request->has('services_price') && !empty($request->services_price)) {
                                $query->where('services.service_price', 'like', "{$request->get('service_price')}%");
                            }

                            if ($request->has('service_num_days') && !empty($request->service_num_days)) {
                                $query->where('services.service_num_days', 'like', "{$request->get('service_num_days')}%");
                            }
							
							if ($request->has('service_num_listings') && !empty($request->service_num_listings)) {
                                $query->where('services.service_num_listings', 'like', "{$request->get('service_num_listings')}%");
                            }
							
							if ($request->has('service_for') && !empty($request->service_for)) {
                                $query->where('services.service_for', 'like', "{$request->get('service_for')}");
                            }
							
                        })
                        ->addColumn('action', function ($services) {                        
                            return '
				<div class="btn-group">
					<button class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action
						<i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu">
						<li>
							<a href="' . route('edit.service', ['id' => $services->id]) . '"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
						</li>						
						<li>
							<a href="javascript:void(0);" onclick="deleteService(' . $services->id . ');" class=""><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a>
						</li>
					</ul>
				</div>';
                        })
                        ->rawColumns(['action'])
                        ->setRowId(function($services) {
                            return 'serviceDtRow' . $services->id;
                        })
                        ->make(true);
        //$query = $dataTable->getQuery()->get();
        //return $query;
    }

}
