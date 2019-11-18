@extends('admin.admin_layout')
@section('admin_content')


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="#">Add products</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add products</h2>

            </div>
            <p class="alert-success">
                <?php
                $message=Session::get('message');
                echo $message;
                Session::put('message',null);


                ?>


            </p>
            <div class="box-content">
                <form class="form-horizontal" action="{{url('save-product')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        >
                        <div class="control-group">
                            <label class="control-label" for="date01">product name</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge " name="product_name">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="selectError3">product category</label>
                            <div class="controls">
                                <select id="selectError3" name="category_id">
                                    <option>select 1</option>
                                    @php
                                        $all_published_category=DB::table('tbl_category')
                                            ->where('publication_status',1)
                                            ->get();
                                    @endphp
                                    @foreach($all_published_category as $category)
                                    <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="selectError3">manufacture name</label>
                            <div class="controls">
                                <select id="selectError3" name="manufacture_id">
                                    <option>select 1</option>
                                    @php
                                        $all_published_manufacture=DB::table('tbl_manufacture')
                                            ->where('publication_status',1)
                                            ->get();
                                    @endphp
                                    @foreach($all_published_manufacture as $manufacture)
                                    <option value="{{$manufacture->manufacture_id}}">{{$manufacture->manufacture_name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">product short description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="product_short_description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">product long description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="product_long_description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">product price</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge " name="product_price">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Image</label>
                            <div class="controls">
                                <input class="input-file uniform_on" name="product_image" id="fileInput" type="file">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">product size</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge " name="product_size">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">product color</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge " name="product_color">
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">publication status</label>
                            <div class="controls">
                                <input type="checkbox" name="publication_status" value="1">
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">add products</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div><!--/row-->

@endsection

