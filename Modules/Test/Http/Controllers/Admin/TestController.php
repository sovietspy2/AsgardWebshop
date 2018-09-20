<?php

namespace Modules\Test\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Test\Entities\Test;
use Modules\Test\Http\Requests\CreateTestRequest;
use Modules\Test\Http\Requests\UpdateTestRequest;
use Modules\Test\Repositories\TestRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class TestController extends AdminBaseController
{
    /**
     * @var TestRepository
     */
    private $test;

    public function __construct(TestRepository $test)
    {
        parent::__construct();

        $this->test = $test;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$tests = $this->test->all();

        return view('test::admin.tests.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('test::admin.tests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateTestRequest $request
     * @return Response
     */
    public function store(CreateTestRequest $request)
    {
        $this->test->create($request->all());

        return redirect()->route('admin.test.test.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('test::tests.title.tests')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Test $test
     * @return Response
     */
    public function edit(Test $test)
    {
        return view('test::admin.tests.edit', compact('test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Test $test
     * @param  UpdateTestRequest $request
     * @return Response
     */
    public function update(Test $test, UpdateTestRequest $request)
    {
        $this->test->update($test, $request->all());

        return redirect()->route('admin.test.test.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('test::tests.title.tests')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Test $test
     * @return Response
     */
    public function destroy(Test $test)
    {
        $this->test->destroy($test);

        return redirect()->route('admin.test.test.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('test::tests.title.tests')]));
    }
}
