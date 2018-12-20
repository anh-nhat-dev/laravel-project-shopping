<div class="col-md-9 col-xs-12">
        <div class="white-box">
            <div class="form-group">
                <label class="col-md-12">Full Name</label>
                <div class="col-md-12">
                <input type="text" name="fullname" placeholder="Johnathan Doe" value="{{$user->fullname}}" class="form-control form-control-line">
                </div>
            </div>
            <div class="form-group">
                <label for="example-email" class="col-md-12">Email</label>
                <div class="col-md-12">
                    <input type="email" disabled value="{{$user->email}}" class="form-control form-control-line"
                        id="example-email"> </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Password</label>
                <div class="col-md-12">
                    <input type="password" value="" name="password" class="form-control form-control-line"> </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Phone No</label>
                <div class="col-md-12">
                <input type="text" value="{{$user->phone}}" name="phone" class="form-control form-control-line">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Address</label>
                <div class="col-md-12">
                    <input type="text" name="address" value="{{$user->address}}"  class="form-control form-control-line">
                </div>
            </div>
            @if ($user->id !== Auth::user()->id)
            <div class="form-group">
                <label class="col-md-12">Level</label>
                <div class="col-md-12">
                    <select class="form-control form-control-line" name="level" id="">
                        <option @if($user->level == 0) selected @endif value="0">Member</option>
                        <option @if($user->level == 1) selected @endif value="1">Admin</option>
                    </select>
                </div>
            </div>
            @endif
            @csrf
            <input name="_method" type="hidden" value="PUT">
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">Public</div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <button class="btn btn-info waves-effect waves-light" type="submit"><span class="btn-label"><i
                                class="ti-save"></i></span>Save</button>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Avatar</div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <img class="img-responsive" src="../plugins/images/assets/studio14.jpg" alt="">
                    <input type="hidden" name="avatar" value="http://localhost:8000/plugins/images/assets/studio14.jpg">
                </div>
            </div>
        </div>
        
    </div>