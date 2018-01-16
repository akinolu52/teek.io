@extends('layout.user')

@section('title', 'profile')

@section('content')
    <div class="wraper container-fluid">
        {{--<div class="row">
            <div class="col-sm-12">
                <div --}}{{--class="bg-picture" style="background-image:url('{{ Auth::user()->avatar }}')"--}}{{-->
                    <span class="bg-picture-overlay"></span>

                    <!-- meta -->
                    <div class="box-layout meta bottom">
                        <div class="col-sm-6 clearfix">
                            <div class="img-wrapper pull-left m-r-15" style="" id="avatarUpd" data-url="{{ route('user.avatar') }}">
                                @if(Auth::user()->avatar)
                                    <img class="br-radius preview_image" src="{{ Auth::user()->avatar }}" style="width:200px">
                                @else
                                    <img class="preview_image br-radius" style="width:200px" src="data:image/png;base64,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">
                                @endif
                                <a href="javascript:changeProfile()"  class="btn">
                                    <i class="glyphicon glyphicon-edit"></i>Change
                                </a>
                                <input type="file" id="file" style="display: none"/>
                                <input type="hidden" id="file_name"/>
                            </div>
                            <div class="media-body">
                                <h3 class="mb-2 m-t-10 ellipsis oldName">{{ Auth::user()->name }}</h3>
                                <h5 class="oldEmail"> {{ Auth::user()->email }}</h5>
                            </div>
                        </div>
                    </div>
                    <!--/ meta -->
                </div>
            </div>
        </div>--}}

        <div class="row m-t-30">
            @if (Session::has('message'))
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <span class="help-block">
                        {{ Session::get('message') }}
                    </span>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <span class="help-block">
                        {{ Session::get('error') }}
                    </span>
                </div>
            @endif
            @if ($errors->has('name') || $errors->has('phone'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Error!</h4>
                    @if ($errors->has('name'))
                        <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif
                    @if ($errors->has('phone'))
                        <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                    @endif
                </div>
            @endif

            <div class="col-sm-12">
                <div class="panel panel-default p-0">
                    <div class="panel-body p-0">
                        <ul class="nav nav-tabs profile-tabs">
                            <li class="active" id="about-Me"><a data-toggle="tab" href="#aboutme">Profile</a></li>
                            <!-- <li class="" id="edit-page"><a data-toggle="tab" href="#edit-profile">Settings</a></li> -->
                        </ul>

                        <div class="tab-content m-0">

                            <div id="aboutme" class="tab-pane active">
                                <div class="profile-desk">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h1>{{ Auth::user()->name }}</h1>
                                            <span class="designation">{{ Auth::user()->email }}</span>
                                        </div>
                                        <div class="col-sm-6 pointer text-right">
                                            <i id="editProfile">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAJ5SURBVGhD7Zi9ixNBFMAjFuIXaK+CjXailV/o/6GdyKmFZyOWItgfKNeLpbdN7nbfm70lM9ki5zVaqaWCh1Za+QHn4WF8b+/NZndv4kcMyQjzgwfZmTfJ+2U+NtlWIBAIBEYhjjtHEjR3ATUmSj8FNBFdzywsrO6WFP+B1Nyhor+BMn1HvE9SfUFS/aTf7++gQucbhbtiw1uZIRJrMZorAOYiKH2vOksJ6nfeLTOnBJrVdjs/ICkFAN3T9SWnr0rX9HFJ0Lf9AyA/KSk1eGYquU+kebr8Zk+sLWXZUUktoWV2rsxB05Pm6TFkJl4XszFo2yZT7BnbT0ezNE8Hp4TSz3hP8LofJgPQO0h5b8sxdJ8p3nAa/EpCUngfbJNRqnOquDHaMajX28vLh2XIZPkTCUtTpiHG17cldbL8jYTFMTNW4qGkTJZRJBjuT5R5Ux1HMc/vJymT418kaEaeV8dRBImRCRJBYowEiSAxRoJEkBgjQcIXCYY+/EG1GPpJ/X1J6RPS7cQ7iSzL9lIBm42CSMZ8BdW9Jmk1vJNgak8wnKHvS2qBlxIMpN1bZUFoepDq67S0PlSKpNiaGW8lGCr+caWoOW7jBwCA+lXZjvoL7xlvJRj62/nCFoZoLktzS6n8EBX+0fbxAWBfS/gjEcfxHiqo3Ohpao5LV0GM+obta4Q/Egx962cGxenPURTtROwcg9RcorY5upesDPrL8EuCoaJmbYG0dNbpyP1kr4eEfxIMzcIjR7Gu2OTnTl5KMLWTSWJrU+uXcprNInbP801ThvhHlOf7qNCNomiaGRK4Gaeds3wASMr/gVJq1+Liyn65DAQCAV9otX4Ctirs6CJ38VwAAAAASUVORK5CYII=">
                                            </i>
                                        </div>
                                    </div>

                                    <form id="profileForm">
                                        <input type="hidden" id="saveProfileUrl" data-url="{{ route('user.update') }}">
                                        {{ csrf_field() }}
                                        <table class="table table-condensed m-t-20">
                                            <thead>
                                            <tr>
                                                <th colspan="2"><span class="h4">Contact Information</span></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><b>Full Name</b></td>
                                                <td>
                                                    <span class="ng-binding oldName">{{ Auth::user()->name }}</span>
                                                    <input class="ng-input form-control" id="profileName" required name="name" value="{{ Auth::user()->name }}" placeholder="Enter Full name">
                                                    <span id="helpName" class="help-block text-danger">Enter name</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Email</b></td>
                                                <td>
                                                    <a href="mailto:{{ Auth::user()->email }}" class="ng-binding oldEmail">
                                                        {{ Auth::user()->email }}
                                                    </a>
                                                    <input type="email" class="ng-input form-control" id="profileEmail" required name="email" value="{{ Auth::user()->email }}" placeholder="Enter email">
                                                    <span id="helpEmail" class="help-block text-danger">Enter email address</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Phone</b></td>
                                                <td>
                                                    <span class="ng-binding" id="oldPhone">{{ Auth::user()->phone }}</span>
                                                    <input class="ng-input form-control" id="profilePhone" required name="phone" value="{{ Auth::user()->phone }}" placeholder="Enter phone number">
                                                    <span id="helpPhone" class="help-block text-danger">Enter phone number</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>About</b></td>
                                                <td>
                                                    <span class="ng-binding" id="oldAbout">{{ Auth::user()->bio }}</span>
                                                    <textarea class="ng-input form-control" id="profileBio" name="bio" placeholder="Enter bio">{{ Auth::user()->bio }}</textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Password</b></td>
                                                <td>
                                                    <span class="ng-binding">********</span>
                                                    <input type="password" class="ng-input form-control" name="password" id="profilePassword" placeholder="Enter Password">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Retype Password</b></td>
                                                <td>
                                                    <span class="ng-binding">********</span>
                                                    <input type="password" class="ng-input form-control" name="confirm" id="profileConfirm" placeholder="Enter Password">
                                                    <span id="helpRetype" class="help-block text-danger">Incorrect password!</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <button class="btn-info btn" id="saveProfile" type="button">
                                                        Save
                                                    </button>
                                                </td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                <!-- <form role="form" method="post" action="" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="FullName">Full Name</label>
                                            <input type="text" name="name" min="3" value="{{ Auth::user()->name }}" id="FullName" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Email">Phone</label>
                                            <input type="text" name="phone" required value="{{ Auth::user()->phone }}" placeholder="080********" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Email">Email</label>
                                            <input type="email" name="email" required value="{{ Auth::user()->email }}" id="Email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Password">Password</label>
                                            <input type="password" name="password" placeholder="6 - 15 Characters" id="Password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="RePassword">Re-Password</label>
                                            <input type="password" name="confirm" placeholder="6 - 15 Characters" id="RePassword" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="AboutMe">About Me</label>
                                            <textarea name="bio" style="height: 125px;" id="AboutMe" class="form-control">{{ Auth::user()->bio }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Profile Image</label>
                                            <input type="file" name="avatar" class="form-control">
                                        </div>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </form> -->
                                </div> <!-- end profile-desk -->
                            </div> <!-- about-me -->

                            <!-- settings -->
                        <!-- <div id="edit-profile" class="tab-pane">
                                <div class="user-profile-content">
                                    <form role="form" method="post" action="{{ route('user.update') }}" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="FullName">Full Name</label>
                                            <input type="text" name="name" min="3" value="{{ Auth::user()->name }}" id="FullName" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Email">Phone</label>
                                            <input type="text" name="phone" required value="{{ Auth::user()->phone }}" placeholder="080********" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Email">Email</label>
                                            <input type="email" name="email" required value="{{ Auth::user()->email }}" id="Email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Password">Password</label>
                                            <input type="password" name="password" placeholder="6 - 15 Characters" id="Password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="RePassword">Re-Password</label>
                                            <input type="password" name="confirm" placeholder="6 - 15 Characters" id="RePassword" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="AboutMe">About Me</label>
                                            <textarea name="bio" style="height: 125px;" id="AboutMe" class="form-control">{{ Auth::user()->bio }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Profile Image</label>
                                            <input type="file" name="avatar" class="form-control">
                                        </div>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </form>
                                </div>
                            </div> -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script>
        jQuery(document).ready(function($) {
            $('.ng-input').toggle();
            $('#saveProfile').toggle();
            $('.help-block').toggle();

            jQuery('#editProfile').click(function (e) {
                e.preventDefault();

                $('.ng-binding').toggle();
                $('.ng-input').toggle();
                $('#saveProfile').toggle();
            });

            jQuery('#saveProfile').click(function (e) {
                e.preventDefault();
                $('.help-block').css('display', 'none');
                if ($("#profilePassword").val() != $("#profileConfirm").val() ) {
                    console.log('sos');
                    $("#helpRetype").toggle();
                    return false;
                }
                if ($("#profileName").val() == "") {
                    $("#helpName").toggle();
                    return false;
                }
                if ($("#profileEmail").val() == "") {
                    $("#helpEmail").toggle();
                    return false;
                }
                if ($("#profilePhone").val() == "") {
                    $("#helpPhone").toggle();
                    return false;
                }
                // else {
                console.log($("#profileForm").serializeArray());
                $.ajax({
                    dataType: 'json',
                    method: 'post',
                    url: $("#saveProfileUrl").data("url"),
                    data: $("#profileForm").serializeArray(),
                    // async: false,
                    success: function(response){
                        // console.log(response)
                        $('.ng-binding').toggle();
                        $('.ng-input').toggle();
                        $('#saveProfile').toggle();

                        $("#oldAbout").text(response.bio);
                        $("#oldPhone").text(response.phone);
                        $(".oldEmail").text(response.email);
                        $(".oldName").text(response.name);
                    },
                    error: function(data){
                        console.log(data);
                        alert("Error in submission")
                    },
                });
                // }

            });
        });
        function changeProfile() {
            $('#file').click();
        }
        $('#file').change(function () {
            if ($(this).val() != '') {
                upload(this);
            }
        });
        function upload(img) {
            console.log(img);
            var form_data = new FormData();
            form_data.append('avatar', img.files[0]);
            form_data.append('_token', '{{csrf_token()}}');
            $('#loading').css('display', 'block');
            console.log(form_data)
            $.ajax({
                url: $("#saveProfileUrl").data("url"),
                data: form_data,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.fail) {
                        alert(data.errors['file']);
                    }
                    else {
                        console.log('{{asset('uploads')}}/' + data)
                        $('#file_name').val(data);
                        $('.preview_image').attr('src', data);
                    }
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                    $('.preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
                }
            });
        }
    </script>
@endsection