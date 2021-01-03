<!-- row -->
<div class="row row-sm">
    <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
        <div class="card  box-shadow-0">
            <div class="card-header">
                <h4 class="card-title mb-1">balance package</h4>
                {{--<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>--}}
            </div>
            <div class="card-body pt-0">
                    <form action="{{ route('dashboard.balancepackages.store') }}" method="POST" class="form-horizontal">
                        @csrf

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>title</label>
                                    <input type="text" name="title" class="form-control" placeholder="title" value="{{$balancepackage->title??old('title')}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>description</label>
                                    <textarea class="form-control" style="height:150px" name="description" placeholder="description">{{$balancepackage->description??old('description')}}</textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>amount</label>
                                    <input type="text" name="amount" class="form-control" placeholder="amount" value="{{$balancepackage->amount??old('amount')}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>price</label>
                                    <input type="text" name="price" class="form-control" placeholder="price" value="{{$balancepackage->price??old('price')}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="checkbox">
                                    <div class="custom-checkbox custom-control">
                                        <input type="hidden" name="active" value="0">
                                        <input type="checkbox" name="active" value="1" {{ $balancepackage->active??old('active') ? 'checked' : '' }} data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                        <label for="checkbox-2" class="custom-control-label mt-1">active</label>
                                    </div>
                                </div>
                            </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">save</button>
                        </div>
                        </div>

                    </form>

            </div>
        </div>
    </div>
</div>
<!-- row -->