<?php

namespace Modules\Wine\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Wine\Entities\Wine;
use Modules\Wine\Http\Requests\CreateWineRequest;
use Modules\Wine\Http\Requests\UpdateWineRequest;
use Modules\Wine\Repositories\WineRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class WineController extends AdminBaseController
{
    /**
     * @var WineRepository
     */
    private $wine;

    public function __construct(WineRepository $wine)
    {
        parent::__construct();

        $this->wine = $wine;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $wines = $this->wine->all();

        return view('wine::admin.wines.index', compact('wines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('wine::admin.wines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateWineRequest $request
     * @return Response
     */
    public function store(CreateWineRequest $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'type' => 'required|',
            'price' => 'required|numeric',
            'identifier' => 'required|numeric|min:1|unique:wine__wines',
            //'file' => 'mimes:jpeg,bmp,png'
        ]);


        $currentWine = $request->all();

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/appsetting/', $filename);
            $currentWine->file = $filename;
        }


        if ($validator->fails()) {
            return redirect('backend/wine/wines/create')
                ->withErrors($validator)
                ->withInput();
        }


        $this->wine->create($currentWine);

        return redirect()->route('admin.wine.wine.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('wine::wines.title.wines')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Wine $wine
     * @return Response
     */
    public function edit(Wine $wine)
    {

        return view('wine::admin.wines.edit', compact('wine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Wine $wine
     * @param  UpdateWineRequest $request
     * @return Response
     */
    public function update(Wine $wine, UpdateWineRequest $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'type' => 'required|',
            'price' => 'required|numeric',
            'identifier' => 'required|numeric|min:1',
        ]);

        if ($validator->fails()) {
            return redirect('backend/wine/wines/'.$wine->id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $this->wine->update($wine, $request->all());

        return redirect()->route('admin.wine.wine.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('wine::wines.title.wines')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Wine $wine
     * @return Response
     */
    public function destroy(Wine $wine)
    {
        $this->wine->destroy($wine);

        return redirect()->route('admin.wine.wine.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('wine::wines.title.wines')]));
    }
}
