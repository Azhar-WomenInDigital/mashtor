@extends('frontend.layouts.dashboard_mastering')
@section('franchise-dashboard-title',' Dashboard ')
@section('frontend-styles')
<link rel="stylesheet" href="{{url('frontend/assets/css/fullcalendar.min.css')}}">
@endsection
@section('frontend-content')
<div class="container mt-5 mb-5">
    @include('frontend.partials._message')
    <br>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            
            
            <div class="card">
                <div class="card-header">
                    Update your profile
                    <span class="float-right"><a href="#" data-toggle="modal" data-target="#studentProfileEdit">Edit Profile</a></span>
                    <!-- Modal -->
                    <div class="modal fade" id="studentProfileEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Update Profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{url('update/student/profile',Auth::user()->id)}}" method="post">
                                        @csrf
                                        
                                        
                                        <div class="form-group">
                                            <label for="f_name" class="">First Name</label>
                                            <input type="text" class="form-control custom-form-control {{ $errors->has('f_name') ? ' is-invalid' : '' }}" id="f_name" name="f_name" value="{{ old('f_name',Auth::user()->f_name) }}" required autocomplete="f_name" autofocus>
                                            @if($errors->has('f_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('f_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="l_name" class="">Last Name</label>
                                            <input type="text" class="form-control custom-form-control {{ $errors->has('l_name') ? ' is-invalid' : '' }}" id="l_name" name="l_name" value="{{ old('l_name',Auth::user()->l_name) }}" required autocomplete="l_name" autofocus>
                                            @if ($errors->has('l_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('l_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="number" class="">Mobile Number</label>
                                            <input type="number" class="form-control custom-form-control {{ $errors->has('number') ? ' is-invalid' : '' }}" id="number" name="number" value="{{ old('number',Auth::user()->number) }}" required autocomplete="number" autofocus>
                                            @if ($errors->has('number'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('number') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="parent_number" class="">Parents Mobile Number</label>
                                            <input type="number" class="form-control custom-form-control {{ $errors->has('parent_number') ? ' is-invalid' : '' }}" id="parent_number" name="parent_number" value="{{ old('parent_number',Auth::user()->parent_number) }}" required autocomplete="parent_number" autofocus >
                                            @if ($errors->has('parent_number'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('parent_number') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="dob" class=""> Date Of Birth </label>
                                            <input type="date" class="form-control custom-form-control {{ $errors->has('dob') ? ' is-invalid' : '' }}" id="dob" name="dob" value="{{ old('dob',Auth::user()->dob) }}" required autocomplete="dob" autofocus >
                                            @if ($errors->has('dob'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('dob') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="gender" class=""> Gender </label>
                                            <select name="gender" id="gender" class="form-control custom-form-control {{ $errors->has('gender') ? ' is-invalid' : '' }}" autofocus>
                                                <?php
                                                if(Auth::user()->gender == 'm'){
                                                echo "<option value='m'>Male</option>";
                                                }elseif (Auth::user()->gender == 'f') {
                                                echo "<option value='f'>Female</option>";
                                                }else{
                                                echo "<option value='o'>Other</option>";
                                                }
                                                ?>
                                                <option value="m">Male</option>
                                                <option value="f">Female</option>
                                                <option value="o">Other</option>
                                            </select>
                                            @if ($errors->has('gender'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="n_lan" class="">Native Language</label>
                                            <input type="text" class="form-control custom-form-control {{ $errors->has('n_lan') ? ' is-invalid' : '' }}" value="{{ old('n_lan',Auth::user()->n_lan) }}" id="n_lan" name="n_lan" autofocus>
                                            @if ($errors->has('n_lan'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('n_lan') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="s_lan" class="">2nd Language</label>
                                            <input type="text" class="form-control custom-form-control {{ $errors->has('s_lan') ? ' is-invalid' : '' }}" value="{{ old('s_lan',Auth::user()->s_lan) }}" id="s_lan" name="s_lan" autofocus>
                                            @if ($errors->has('s_lan'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('s_lan') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="tnr" class="">Referral TNR</label>
                                            <input type="text" class="form-control custom-form-control {{ $errors->has('tnr') ? ' is-invalid' : '' }}" value="{{ old('tnr',Auth::user()->tnr) }}" id="tnr" name="tnr" autofocus>
                                            @if ($errors->has('tnr'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('tnr') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <select name="country" id="country" class="form-control custom-form-control {{ $errors->has('country') ? ' is-invalid' : '' }}">
                                                <option value="{{Auth::user()->country}}">{{Auth::user()->country}}</option>
                                                <option value="">Select Country</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Åland Islands">Åland Islands</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Territories">French Southern Territories</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guernsey">Guernsey</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-bissau">Guinea-bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Isle of Man">Isle of Man</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jersey">Jersey</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                <option value="Korea, Republic of">Korea, Republic of</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macao">Macao</option>
                                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montenegro">Montenegro</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn">Pitcairn</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russian Federation">Russian Federation</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Helena">Saint Helena</option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                <option value="Saint Lucia">Saint Lucia</option>
                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia">Serbia</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Timor-leste">Timor-leste</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Viet Nam">Viet Nam</option>
                                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                            @if($errors->has('country'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('country') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="district" class="">District or State</label>
                                            <input type="text" class="form-control custom-form-control {{ $errors->has('district') ? ' is-invalid' : '' }}" value="{{ old('district',Auth::user()->district) }}" name="district" id="district" autofocus >
                                            @if($errors->has('district'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('district') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="upozila" class="">Upozila or Zone</label>
                                            <input type="text" class="form-control custom-form-control {{ $errors->has('upozila') ? ' is-invalid' : '' }}" value="{{ old('upozila',Auth::user()->upozila) }}" name="upozila" id="upozila"autofocus >
                                            @if($errors->has('upozila'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('upozila') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="2_lan" class="">Address ( Village or Street no  ) & Union 0r Zone</label>
                                            <textarea name="address" id="" cols="10" rows="3" class="form-control custom-form-control {{ $errors->has('address') ? ' is-invalid' : '' }} " autofocus> {{ old('address',Auth::user()->address) }}</textarea>
                                            @if($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-success custom-btn">Submit</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="media">
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                    $franchises = DB::table('franchises')->where('user_id',Auth::user()->id)->first();
                                    if(isset($franchises)){
                                        //$user_id = Auth::user()->id;

                                ?>

                                <form method="post" action="{{url('franchise/profile/update',Auth::user()->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <input type="hidden" class="" name="user_id" value="{{Auth::user()->id}}">
                                    <?php echo "<img id='blah' src='".asset($franchises->image)."' alt='' style='height: 150px;width: 100%:'' />"; ?>
                                    
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" id="imgInp" class="custom-file-input"  aria-describedby="inputGroupFileAddon04" required>
                                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Upload</button>
                                        </div>
                                    </div>
                                </form>
                                <?php }else{ ?>
                                <form method="post" action="{{url('franchise/profile/upload')}}" enctype="multipart/form-data">
                                    @csrf
                                    <img id="blah" src="{{url('frontend/assets/imgs/user_icon.png')}}" alt="your image" style="height: 150px;width: 100%:" />
                                    
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" id="imgInp" class="custom-file-input"  aria-describedby="inputGroupFileAddon04" required>
                                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Upload</button>
                                        </div>
                                    </div>
                                </form>
                            <?php } ?>
                            </div>
                            <div class="col-md-6">
                                
                                <div class="media-body">
                                    <h5 class="mt-0">{{Auth::user()->f_name}} {{Auth::user()->l_name}}</h5>
                                    {{Auth::user()->created_at}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="personal-info">
                        <p><b>Eamil : </b> {{Auth::user()->email}}</p>
                        <p><b>Number : </b> {{Auth::user()->number}}</p>
                        <p><b>Parent Number : </b> {{Auth::user()->parent_number}}</p>
                        <p><b>Date of Birth : </b> {{Auth::user()->dob}}</p>
                        <p><b>Gender : </b> {{Auth::user()->gender}}</p>
                        <p><b>TNR : </b> {{Auth::user()->tnr}}</p>
                        <p><b>Address : </b> {{Auth::user()->address}}</p>
                        <p><b>District : </b> {{Auth::user()->district}}</p>
                        <p><b>Upozila : </b> {{Auth::user()->upozila}}</p>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End content-page -->
</div>
<br>
<br>
@section('frontend-scripts')
<script src="{{url('frontend/assets/js/jquery-ui.min.js')}}"></script>
<script src="{{url('frontend/assets/js/moment.js')}}"></script>
<script src="{{url('frontend/assets/js/fullcalendar.min.js')}}"></script>
<script src="{{url('frontend/assets/js/jquery.fullcalendar.js')}}"></script>
@endsection
@endsection