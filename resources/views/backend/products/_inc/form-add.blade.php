<form action={{route('admin.products.store')}} class="form-horizontal" method="POST">
    <div class="col-md-9">
        <!-- Tabstyle start -->
        <section>
            <div class="sttabs tabs-style-bar">
                <nav>
                    <ul>
                        <li><a href="#section-bar-1" class="sticon ti-layout-menu-v"><span>Details</span></a></li>
                        <li><a href="#section-bar-2" class="sticon icon-tag"><span>Attributes</span></a></li>
                    </ul>
                </nav>
                <div class="content-wrap">
                    <section style="padding: 1px 2px" id="section-bar-1">
                        <div class="white-box">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Tên sản phẩm <span class="help text-danger">*</span></label>
                                    <div>
                                        <input type="text" class="form-control" name="name" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Mô tả sản phẩm <span class="help text-danger">*</span></label>
                                <div class="col-md-12">
                                    <textarea id="mymce" name="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                price
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-md-12">Is Sale</label>
                                        <div class="col-md-12">
                                            <input type="checkbox" name="is_sale" value="true" class="js-switch"
                                                data-color="#36c6d3" data-size="small" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group m-r-20">
                                            <label>Regular Price <span class="help text-danger">*</span></label>
                                            <div>
                                                <input name="price" type="number" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sale Price <span class="help text-danger">*</span></label>
                                            <div>
                                                <input name="sale_price" type="number" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group m-r-20">
                                            <label>Quantity <span class="help text-danger">*</span></label>
                                            <div>
                                                <input name="quantity" type="number" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Gellery
                                <div class="input-group pull-right" style="display: inline-block">
                                    <span class="input-group-btn " style="display: inline-block">
                                        <a id="gallery" data-result="imgGallery" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="m-t-20 row">
                                        <div id="imgGallery">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section style="padding: 1px 2px" id="section-bar-2">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <a id="createattribute" class="btn btn-success" id="unblockbtn1"><i class="icon-plus"></i>
                                        Create Attribute</a>
                                </div>
                            </div>
                        </div>
                        <div class="white-box" id="attributes">

                        </div>
                    </section>
                </div>
                <!-- /content -->
            </div>
            <!-- /tabs -->
        </section>
        <!-- Tabstyle start -->
    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">Public</div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-md-12">Is Future</label>
                        <div class="col-md-12">
                            <input type="checkbox" name="is_future" value="true" class="js-switch" data-color="#36c6d3"
                                data-size="small" />
                        </div>
                    </div>
                    <button class="btn btn-info waves-effect waves-light" type="submit"><span class="btn-label"><i
                                class="ti-save"></i></span>Save</button>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Status</div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <select name="status" class="selectpicker" data-style="form-control">
                        <option value="public">Public</option>
                        <option value="draff">Draff</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Categories</div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <select class="selectpicker" name="categories_id" data-style="form-control">
                        @foreach ($cates as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Thumbnail</div>
            <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-result="thumbnail" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                        </div>
                        <div id="thumbnail">
                            
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <style>
        .item-img {
            width: 150px;
            height: 150px;
            display: inline-block;
            margin-right: 15px;
            border: 1px solid #ddd;
            padding: 15px;
            background-size: cover;
            position: relative;
            margin-top: 15px;
        }

        .item-img-delete {
            position: absolute;
            top: -10px;
            right: -10px;
            color: red;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 50%;
        }

    </style>
    @csrf
</form>
