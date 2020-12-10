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
                                                <option data-countryCode="DZ" value="Afghanistan">Afghanistan(+93)</option>
        <option data-countryCode="DZ" value="Algeria">Algeria (+213)</option>
        <option data-countryCode="AD" value="Andorra">Andorra (+376)</option>
        <option data-countryCode="AO" value="Angola">Angola (+244)</option>
        <option data-countryCode="AI" value="Anguilla">Anguilla (+1264)</option>
        <option data-countryCode="AG" value="Antigua Barbuda">Antigua &amp; Barbuda (+1268)</option>
        <option data-countryCode="AR" value="Argentina">Argentina (+54)</option>
        <option data-countryCode="AM" value="Armenia">Armenia (+374)</option>
        <option data-countryCode="AW" value="Aruba">Aruba (+297)</option>
        <option data-countryCode="AU" value="Australia">Australia (+61)</option>
        <option data-countryCode="AT" value="Austria">Austria (+43)</option>
        <option data-countryCode="AZ" value="Azerbaijan">Azerbaijan (+994)</option>
        <option data-countryCode="BS" value="Bahamas">Bahamas (+1242)</option>
        <option data-countryCode="BH" value="Bahrain">Bahrain (+973)</option>
        <option data-countryCode="BD" value="Bangladesh">Bangladesh (+880)</option>
        <option data-countryCode="BB" value="Barbados">Barbados (+1246)</option>
        <option data-countryCode="BY" value="Belarus">Belarus (+375)</option>
        <option data-countryCode="BE" value="Belgium">Belgium (+32)</option>
        <option data-countryCode="BZ" value="Belize">Belize (+501)</option>
        <option data-countryCode="BJ" value="Benin">Benin (+229)</option>
        <option data-countryCode="BM" value="Bermuda">Bermuda (+1441)</option>
        <option data-countryCode="BT" value="Bhutan">Bhutan (+975)</option>
        <option data-countryCode="BO" value="Bolivia">Bolivia (+591)</option>
        <option data-countryCode="BA" value="Bosnia Herzegovina">Bosnia Herzegovina (+387)</option>
        <option data-countryCode="BW" value="Botswana">Botswana (+267)</option>
        <option data-countryCode="BR" value="Brazil">Brazil (+55)</option>
        <option data-countryCode="BN" value="Brunei">Brunei (+673)</option>
        <option data-countryCode="BG" value="Bulgaria">Bulgaria (+359)</option>
        <option data-countryCode="BF" value="Burkina">Burkina Faso (+226)</option>
        <option data-countryCode="BI" value="Burundi">Burundi (+257)</option>
        <option data-countryCode="KH" value="Cambodia">Cambodia (+855)</option>
        <option data-countryCode="CM" value="Cameroon">Cameroon (+237)</option>
        <option data-countryCode="CA" value="Canada">Canada (+1)</option>
        <option data-countryCode="CV" value="Cape Verde Islands ">Cape Verde Islands (+238)</option>
        <option data-countryCode="KY" value="Cayman Islands">Cayman Islands (+1345)</option>
        <option data-countryCode="CF" value="Central African Republic">Central African Republic (+236)</option>
        <option data-countryCode="CL" value="Chile">Chile (+56)</option>
        <option data-countryCode="CN" value="China">China (+86)</option>
        <option data-countryCode="CO" value="Colombia">Colombia (+57)</option>
        <option data-countryCode="KM" value="Comoros">Comoros (+269)</option>
        <option data-countryCode="CG" value="Congo">Congo (+242)</option>
        <option data-countryCode="CK" value="Cook Islands">Cook Islands (+682)</option>
        <option data-countryCode="CR" value="Costa Rica">Costa Rica (+506)</option>
        <option data-countryCode="HR" value="Croatia">Croatia (+385)</option>
        <option data-countryCode="CU" value="Cuba">Cuba (+53)</option>
        <option data-countryCode="CY" value=">Cyprus North ">Cyprus North (+90392)</option>
        <option data-countryCode="CY" value="Cyprus South ">Cyprus South (+357)</option>
        <option data-countryCode="CZ" value="Czech Republic">Czech Republic (+42)</option>
        <option data-countryCode="DK" value="Denmark">Denmark (+45)</option>
        <option data-countryCode="DJ" value="Djibouti">Djibouti (+253)</option>
        <option data-countryCode="DM" value="Dominica">Dominica (+1809)</option>
        <option data-countryCode="DO" value="Dominican Republic">Dominican Republic (+1809)</option>
        <option data-countryCode="EC" value="Ecuador">Ecuador (+593)</option>
        <option data-countryCode="EG" value="Egypt">Egypt (+20)</option>
        <option data-countryCode="SV" value="El Salvador">El Salvador (+503)</option>
        <option data-countryCode="GQ" value="Equatorial Guinea">Equatorial Guinea (+240)</option>
        <option data-countryCode="ER" value="Eritrea">Eritrea (+291)</option>
        <option data-countryCode="EE" value="Estonia">Estonia (+372)</option>
        <option data-countryCode="ET" value="Ethiopia">Ethiopia (+251)</option>
        <option data-countryCode="FK" value="Falkland Islands">Falkland Islands (+500)</option>
        <option data-countryCode="FO" value="Faroe Islands">Faroe Islands (+298)</option>
        <option data-countryCode="FJ" value="Fiji">Fiji (+679)</option>
        <option data-countryCode="FI" value="Finland">Finland (+358)</option>
        <option data-countryCode="FR" value="France">France (+33)</option>
        <option data-countryCode="GF" value=">French Guiana">French Guiana (+594)</option>
        <option data-countryCode="PF" value="French Polynesia">French Polynesia (+689)</option>
        <option data-countryCode="GA" value="Gabon">Gabon (+241)</option>
        <option data-countryCode="GM" value="Gambia">Gambia (+220)</option>
        <option data-countryCode="GE" value="Georgia">Georgia (+7880)</option>
        <option data-countryCode="DE" value="Germany">Germany (+49)</option>
        <option data-countryCode="GH" value="Ghana">Ghana (+233)</option>
        <option data-countryCode="GI" value="Gibraltar">Gibraltar (+350)</option>
        <option data-countryCode="GR" value="Greece">Greece (+30)</option>
        <option data-countryCode="GL" value="Greenland">Greenland (+299)</option>
        <option data-countryCode="GD" value="Grenada">Grenada (+1473)</option>
        <option data-countryCode="GP" value="Guadeloupe">Guadeloupe (+590)</option>
        <option data-countryCode="GU" value="Guam">Guam (+671)</option>
        <option data-countryCode="GT" value="Guatemala">Guatemala (+502)</option>
        <option data-countryCode="GN" value="Guinea">Guinea (+224)</option>
        <option data-countryCode="GW" value="Guinea">Guinea - Bissau (+245)</option>
        <option data-countryCode="GY" value="Guyana">Guyana (+592)</option>
        <option data-countryCode="HT" value="509">Haiti (+509)</option>
        <option data-countryCode="HN" value="Honduras">Honduras (+504)</option>
        <option data-countryCode="HK" value="Hong">Hong Kong (+852)</option>
        <option data-countryCode="HU" value="Hungary">Hungary (+36)</option>
        <option data-countryCode="IS" value="Iceland">Iceland (+354)</option>
        <option data-countryCode="IN" value="India">India (+91)</option>
        <option data-countryCode="ID" value="Indonesia">Indonesia (+62)</option>
        <option data-countryCode="IR" value="Iran">Iran (+98)</option>
        <option data-countryCode="IQ" value="Iraq">Iraq (+964)</option>
        <option data-countryCode="IE" value="Ireland">Ireland (+353)</option>
        <option data-countryCode="IL" value="Israel">Israel (+972)</option>
        <option data-countryCode="IT" value="Italy">Italy (+39)</option>
        <option data-countryCode="JM" value="Jamaica">Jamaica (+1876)</option>
        <option data-countryCode="JP" value="Japan">Japan (+81)</option>
        <option data-countryCode="JO" value="Jordan">Jordan (+962)</option>
        <option data-countryCode="KZ" value="Kazakhstan">Kazakhstan (+7)</option>
        <option data-countryCode="KE" value="Kenya">Kenya (+254)</option>
        <option data-countryCode="KI" value="Kiribati">Kiribati (+686)</option>
        
        <option data-countryCode="KW" value="Kuwait">Kuwait (+965)</option>
        <option data-countryCode="KG" value="Kyrgyzstan">Kyrgyzstan (+996)</option>
        <option data-countryCode="LA" value="Laos">Laos (+856)</option>
        <option data-countryCode="LV" value="Latvia">Latvia (+371)</option>
        <option data-countryCode="LB" value="Lebanon">Lebanon (+961)</option>
        <option data-countryCode="LS" value="Lesotho">Lesotho (+266)</option>
        <option data-countryCode="LR" value="Liberia">Liberia (+231)</option>
        <option data-countryCode="LY" value="Libya">Libya (+218)</option>
        <option data-countryCode="LI" value="Liechtenstein">Liechtenstein (+417)</option>
        <option data-countryCode="LT" value="Lithuania">Lithuania (+370)</option>
        <option data-countryCode="LU" value="Luxembourg">Luxembourg (+352)</option>
        <option data-countryCode="MO" value="Macao">Macao (+853)</option>
        <option data-countryCode="MK" value="Macedonia">Macedonia (+389)</option>
        <option data-countryCode="MG" value="Madagascar">Madagascar (+261)</option>
        <option data-countryCode="MW" value="Malawi">Malawi (+265)</option>
        <option data-countryCode="MY" value="Malaysia">Malaysia (+60)</option>
        <option data-countryCode="MV" value="Maldives">Maldives (+960)</option>
        <option data-countryCode="ML" value="Mali">Mali (+223)</option>
        <option data-countryCode="MT" value="Malta">Malta (+356)</option>
        <option data-countryCode="MH" value="Marshall">Marshall Islands (+692)</option>
        <option data-countryCode="MQ" value="Martinique">Martinique (+596)</option>
        <option data-countryCode="MR" value="Mauritania">Mauritania (+222)</option>
        <option data-countryCode="YT" value="Mayotte">Mayotte (+269)</option>
        <option data-countryCode="MX" value="Mexico">Mexico (+52)</option>
        <option data-countryCode="FM" value="Micronesia">Micronesia (+691)</option>
        <option data-countryCode="MD" value="Moldova">Moldova (+373)</option>
        <option data-countryCode="MC" value="Monaco">Monaco (+377)</option>
        <option data-countryCode="MN" value="Mongolia">Mongolia (+976)</option>
        <option data-countryCode="MS" value="Montserrat">Montserrat (+1664)</option>
        <option data-countryCode="MA" value="Morocco">Morocco (+212)</option>
        <option data-countryCode="MZ" value="Mozambique">Mozambique (+258)</option>
        <option data-countryCode="MN" value="Myanmar">Myanmar (+95)</option>
        <option data-countryCode="NA" value="Namibia">Namibia (+264)</option>
        <option data-countryCode="NR" value="Nauru">Nauru (+674)</option>
        <option data-countryCode="NP" value="Nepal">Nepal (+977)</option>
        <option data-countryCode="NL" value="Netherlands">Netherlands (+31)</option>
        <option data-countryCode="NC" value="New Caledonia">New Caledonia (+687)</option>
        <option data-countryCode="NZ" value="New Zealand ">New Zealand (+64)</option>
        <option data-countryCode="NI" value="Nicaragua">Nicaragua (+505)</option>
        <option data-countryCode="NE" value="Niger">Niger (+227)</option>
        <option data-countryCode="NG" value="Nigeria">Nigeria (+234)</option>
        <option data-countryCode="NU" value="Niue">Niue (+683)</option>

        <option data-countryCode="KP" value="Korea North">North Korea  (+850)</option>
        <option data-countryCode="NF" value="Norfolk Islands">Norfolk Islands (+672)</option>
        <option data-countryCode="NP" value="Northern Marianas">Northern Marianas (+670)</option>
        <option data-countryCode="NO" value="Norway">Norway (+47)</option>
        <option data-countryCode="OM" value="Oman">Oman (+968)</option>
        <option value="Pakistan">Pakistan(+92)</option>
        <option data-countryCode="PW" value="Palau">Palau (+680)</option>
        <option data-countryCode="PA" value="Panama">Panama (+507)</option>
        <option data-countryCode="PG" value="Papua New Guinea ">Papua New Guinea (+675)</option>
        <option data-countryCode="PY" value="Paraguay">Paraguay (+595)</option>
        <option data-countryCode="PE" value="Peru">Peru (+51)</option>
        <option data-countryCode="PH" value="Philippines">Philippines (+63)</option>
        <option data-countryCode="PL" value="Poland">Poland (+48)</option>
        <option data-countryCode="PT" value="Portugal">Portugal (+351)</option>
        <option data-countryCode="PR" value="Puerto Rico">Puerto Rico (+1787)</option>
        <option data-countryCode="QA" value="Qatar">Qatar (+974)</option>
        <option data-countryCode="RE" value="Reunion">Reunion (+262)</option>
        <option data-countryCode="RO" value="Romania">Romania (+40)</option>
        <option data-countryCode="RU" value="Russia">Russia (+7)</option>
        <option data-countryCode="RW" value="Rwanda">Rwanda (+250)</option>
        <option data-countryCode="SM" value="San Marino ">San Marino (+378)</option>
        <option data-countryCode="ST" value="Sao Tome  Principe">Sao Tome &amp; Principe (+239)</option>
        <option data-countryCode="SA" value="Saudi Arabia">Saudi Arabia (+966)</option>
        <option data-countryCode="SN" value="Senegal">Senegal (+221)</option>
        <option data-countryCode="CS" value="Serbia">Serbia (+381)</option>
        <option data-countryCode="SC" value="Seychelles">Seychelles (+248)</option>
        <option data-countryCode="SL" value="Sierra Leone">Sierra Leone (+232)</option>
        <option data-countryCode="SG" value="Singapore">Singapore (+65)</option>
        <option data-countryCode="SK" value="Slovak Republic">Slovak Republic (+421)</option>
        <option data-countryCode="SI" value="Slovenia">Slovenia (+386)</option>
        <option data-countryCode="SB" value="Solomon Islands">Solomon Islands (+677)</option>
        <option data-countryCode="SO" value="Somalia">Somalia (+252)</option>
        <option data-countryCode="ZA" value="South Africa">South Africa (+27)</option>
        <option data-countryCode="KR" value="Korea South"> South Korea  (+82)</option>
        <option data-countryCode="ES" value="Spain">Spain (+34)</option>
        <option data-countryCode="LK" value="Sri Lanka">Sri Lanka (+94)</option>
        <option data-countryCode="SH" value="St. Helena">St. Helena (+290)</option>
        <option data-countryCode="KN" value="St. Kitts">St. Kitts (+1869)</option>
        <option data-countryCode="SC" value="St. Lucia">St. Lucia (+1758)</option>
        <option data-countryCode="SD" value="Sudan">Sudan (+249)</option>
        <option data-countryCode="SR" value="Suriname">Suriname (+597)</option>
        <option data-countryCode="SZ" value="Swaziland">Swaziland (+268)</option>
        <option data-countryCode="SE" value="Sweden">Sweden (+46)</option>
        <option data-countryCode="CH" value="Switzerland">Switzerland (+41)</option>
        <option data-countryCode="SI" value="Syria">Syria (+963)</option>
        <option data-countryCode="TW" value="Taiwan">Taiwan (+886)</option>
        <option data-countryCode="TJ" value="Tajikstan">Tajikstan (+7)</option>
        <option data-countryCode="TH" value="Thailand">Thailand (+66)</option>
        <option data-countryCode="TG" value="Togo">Togo (+228)</option>
        <option data-countryCode="TO" value="Tonga">Tonga (+676)</option>
        <option data-countryCode="TT" value="Trinidad Tobago">Trinidad &amp; Tobago (+1868)</option>
        <option data-countryCode="TN" value="Tunisia">Tunisia (+216)</option>
        <option data-countryCode="TR" value="Turkey">Turkey (+90)</option>
        <option data-countryCode="TM" value="Turkmenistan">Turkmenistan (+7)</option>
        <option data-countryCode="TM" value="Turkmenistan">Turkmenistan (+993)</option>
        <option data-countryCode="TC" value="Turks  Caicos Islands">Turks &amp; Caicos Islands (+1649)</option>
        <option data-countryCode="TV" value="Tuvalu">Tuvalu (+688)</option>
        <option data-countryCode="UG" value="Uganda">Uganda (+256)</option>
        <option data-countryCode="GB" value="UK">UK (+44)</option>
        <option data-countryCode="UA" value="Ukraine">Ukraine (+380)</option>
        <option data-countryCode="AE" value="United Arab Emirates">United Arab Emirates (+971)</option>
        <option data-countryCode="UY" value="Uruguay">Uruguay (+598)</option>
        <option data-countryCode="US" value="USA">USA (+1)</option>
        <option data-countryCode="UZ" value="Uzbekistan">Uzbekistan (+7)</option>
        <option data-countryCode="VU" value="Vanuatu">Vanuatu (+678)</option>
        <option data-countryCode="VA" value="Vatican City">Vatican City (+379)</option>
        <option data-countryCode="VE" value="Venezuela">Venezuela (+58)</option>
        <option data-countryCode="VN" value="Vietnam">Vietnam (+84)</option>
        <option data-countryCode="VG" value="Virgin Islands - British">Virgin Islands - British (+1284)</option>
        <option data-countryCode="VI" value="Virgin Islands - US">Virgin Islands - US (+1340)</option>
        <option data-countryCode="WF" value="Wallis Futuna ">Wallis &amp; Futuna (+681)</option>
        <option data-countryCode="YE" value="Yemen (North)">Yemen (North)(+969)</option>
        <option data-countryCode="YE" value="Yemen (South)">Yemen (South)(+967)</option>
        <option data-countryCode="ZM" value="Zambia">Zambia (+260)</option>
        <option data-countryCode="ZW" value="Zimbabwe">Zimbabwe (+263)</option>
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
                                    $studentInfo = DB::table('student_basic_infos')->where('user_id',Auth::user()->id)->first();
                                    if(isset($studentInfo)){
                                        //$user_id = Auth::user()->id;

                                ?>

                                <form method="post" action="{{url('student/profile/update',Auth::user()->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <input type="hidden" class="" name="user_id" value="{{Auth::user()->id}}">
                                    <?php echo "<img id='blah' src='".asset($studentInfo->image)."' alt='' style='height: 150px;width: 100%:'' />"; ?>
                                    
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
                                <form method="post" action="{{url('student/profile/upload')}}" enctype="multipart/form-data">
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
                    <div class="row">
                        <div class="col-md-6">
                            
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
                        <div class="col-md-6">
                            <?php
                                $category_info = DB::table('student_profile_academics')->where('user_id',Auth::user()->id)->first();
                                if(isset($category_info) && !empty($category_info)){
                                ?>
                            
                            <div class="personal-info">
                                <h4>Academic Information </h4> <a href="#" data-toggle="modal" data-target="#category_info" class="btn btn-success custom-btn float-right">Edit</a><br> <br>
                                <p><b>Class : </b> {{$category_info->class}}</p>
                                <p><b>Medium : </b> 
                                    <?php
                                        if($category_info->medium == '1'){
                                            echo "Bangla";
                                        }else{
                                            echo "English";
                                        }
                                    ?>
                                </p>
                                <p><b>Group : </b> {{$category_info->group}}</p>
                                <p><b>Subject : </b> {{$category_info->subject}}</p>
                            </div>



                             <div class="modal fade" id="category_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Update Profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{url('update/stuent/academic/profile',$category_info->id)}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Class</label>
                                            <select name="class" id="classId" class="form-control">
                                                 <option value="{{$category_info->class}}">{{$category_info->class}}</option>

                                                 <option value="">Select Class</option>
                                                <?php 
                                                    for($i=1;$i<=12;$i++){
                                                ?>
                                                <option value="{{$i}}"><?php echo $i;?></option>
                                                <?php
                                                    }
                                                 ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Medium</label>
                                            <select name="medium" id="" class="form-control">
                                                 <option value="{{$category_info->medium}}">
                                                    <?php
                                                        if($category_info->medium == '1'){
                                                            echo "Bangla";
                                                        }else{
                                                            echo "English";
                                                        }
                                                    ?> 
                                                </option>
                                                
                                                    <?php
                                                        if($category_info->medium == '1'){
                                                            echo "<option value='2'>English</option>";
                                                        }else{
                                                            echo "<option value='1'>Bangla</option>";
                                                        }
                                                    ?> 
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Subject</label>
                                            <select name="subject" id="faculty" class="form-control">
                                                <option value="">{{$category_info->subject}}</option>
                                                <!-- <option value="">Select Subject</option>
                                                <?php
                                                    //$subjects = DB::table('student_profile_academics')->get();
                                                    //foreach($subjects as $sub){
                                                ?>
                                                <option value=""></option>
                                            <?php // } ?> -->
                                            </select>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success custom-btn" value="Update">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                            <?php } ?>
                        </div>
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
<script>
    $(document).ready(function(){
        $('#classId').change(function(){
            var classId = $(this).val();
            $.ajax({
                url:"{{ url('/getSubject/') }}"+ "/" + classId,
                method:"get",
                data:{classId:classId},
                success:function(result)
                {
                    $('#faculty').html(result);
                }
            });
        });
    });
</script>
@endsection
@endsection