@extends('admin.layout.base')

@section('title', 'Site Settings ')

@section('content')

<div class="content-area py-1">
    <div class="container-fluid">
    	<div class="box box-block bg-white">
			<h5>@lang('admin.setting.Site_Settings')</h5>

            <form class="form-horizontal" action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data" role="form">
            	{{csrf_field()}}

				<div class="form-group row">
					<label for="site_title" class="col-xs-2 col-form-label">@lang('admin.setting.Site_Name')</label>
					<div class="col-xs-10">
						<input class="form-control" type="text" value="{{ Setting::get('site_title', 'Tranxit')  }}" name="site_title" required id="site_title" placeholder="Site Name">
					</div>
				</div>

				<div class="form-group row">
					<label for="site_logo" class="col-xs-2 col-form-label">@lang('admin.setting.Site_Logo')</label>
					<div class="col-xs-10">
						@if(Setting::get('site_logo')!='')
	                    <img style="height: 90px; margin-bottom: 15px;" src="{{ Setting::get('site_logo', asset('logo-black.png')) }}">
	                    @endif
						<input type="file" accept="image/*" name="site_logo" class="dropify form-control-file" id="site_logo" aria-describedby="fileHelp">
					</div>
				</div>


				<div class="form-group row">
					<label for="site_icon" class="col-xs-2 col-form-label">@lang('admin.setting.Site_Icon')</label>
					<div class="col-xs-10">
						@if(Setting::get('site_icon')!='')
	                    <img style="height: 90px; margin-bottom: 15px;" src="{{ Setting::get('site_icon') }}">
	                    @endif
						<input type="file" accept="image/*" name="site_icon" class="dropify form-control-file" id="site_icon" aria-describedby="fileHelp">
					</div>
				</div>

                <div class="form-group row">
                    <label for="tax_percentage" class="col-xs-2 col-form-label">@lang('admin.setting.Copyright_Content')</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" value="{{ Setting::get('site_copyright', '&copy; '.date('Y').' Appoets') }}" name="site_copyright" id="site_copyright" placeholder="Site Copyright">
                    </div>
                </div>

				<div class="form-group row">
					<label for="store_link_android" class="col-xs-2 col-form-label">@lang('admin.setting.Playstore_link')</label>
					<div class="col-xs-10">
						<input class="form-control" type="text" value="{{ Setting::get('store_link_android', '')  }}" name="store_link_android"  id="store_link_android" placeholder="Playstore link">
					</div>
				</div>

				<div class="form-group row">
					<label for="store_link_ios" class="col-xs-2 col-form-label">@lang('admin.setting.Appstore_Link')</label>
					<div class="col-xs-10">
						<input class="form-control" type="text" value="{{ Setting::get('store_link_ios', '')  }}" name="store_link_ios"  id="store_link_ios" placeholder="Appstore link">
					</div>
				</div>

				<div class="form-group row">
					<label for="provider_select_timeout" class="col-xs-2 col-form-label">@lang('admin.setting.Provider_Accept_Timeout')</label>
					<div class="col-xs-10">
						<input class="form-control" type="number" value="{{ Setting::get('provider_select_timeout', '60')  }}" name="provider_select_timeout" required id="provider_select_timeout" placeholder="Provider Timout">
					</div>
				</div>

				<div class="form-group row">
					<label for="provider_search_radius" class="col-xs-2 col-form-label">@lang('admin.setting.Provider_Search_Radius')</label>
					<div class="col-xs-10">
						<input class="form-control" type="number" value="{{ Setting::get('provider_search_radius', '100')  }}" name="provider_search_radius" required id="provider_search_radius" placeholder="Provider Search Radius">
					</div>
				</div>

				<div class="form-group row">
					<label for="sos_number" class="col-xs-2 col-form-label">@lang('admin.setting.SOS_Number')</label>
					<div class="col-xs-10">
						<input class="form-control" type="number" value="{{ Setting::get('sos_number', '911')  }}" name="sos_number" required id="sos_number" placeholder="SOS Number">
					</div>
				</div>

				<div class="form-group row">
					<label for="stripe_secret_key" class="col-xs-2 col-form-label"> Manual Assigning </label>
					<div class="col-xs-10">
						<div class="float-xs-left mr-1"><input @if(Setting::get('manual_request') == 1) checked  @endif  name="manual_request" type="checkbox" class="js-switch" data-color="#43b968"></div>
					</div>
				</div>

				<div class="form-group row">
					<label for="broadcast_request" class="col-xs-2 col-form-label"> BroadCast Assigning </label>
					<div class="col-xs-10">
						<div class="float-xs-left mr-1"><input @if(Setting::get('broadcast_request') == 1) checked  @endif  name="broadcast_request" type="checkbox" class="js-switch" data-color="#43b968"></div>
					</div>
				</div>

				<div class="form-group row">
					<label for="track_distance" class="col-xs-2 col-form-label"> Track Live Travel Distance </label>
					<div class="col-xs-10">
						<div class="float-xs-left mr-1"><input @if(Setting::get('track_distance') == 1) checked  @endif  name="track_distance" type="checkbox" class="js-switch" data-color="#43b968"></div>
					</div>
				</div>

				<div class="form-group row">
					<label for="contact_number" class="col-xs-2 col-form-label">@lang('admin.setting.Contact_Number')</label>
					<div class="col-xs-10">
						<input class="form-control" type="number" value="{{ Setting::get('contact_number', '911')  }}" name="contact_number" required id="contact_number" placeholder="Contact Number">
					</div>
				</div>

				<div class="form-group row">
					<label for="contact_email" class="col-xs-2 col-form-label">@lang('admin.setting.Contact_Email')</label>
					<div class="col-xs-10">
						<input class="form-control" type="email" value="{{ Setting::get('contact_email', '')  }}" name="contact_email" required id="contact_email" placeholder="Contact Email">
					</div>
				</div>

				<div class="form-group row">
					<label for="social_login" class="col-xs-2 col-form-label">@lang('admin.setting.Social_Login')</label>
					<div class="col-xs-10">
						<select class="form-control" id="social_login" name="social_login">
							<option value="1" @if(Setting::get('social_login', 0) == 1) selected @endif>@lang('admin.Enable')</option>
							<option value="0" @if(Setting::get('social_login', 0) == 0) selected @endif>@lang('admin.Disable')</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label for="map_key" class="col-xs-2 col-form-label">@lang('admin.setting.map_key')</label>
					<div class="col-xs-10">
						<input class="form-control" type="text" value="{{ Setting::get('map_key')  }}" name="map_key" required id="map_key" placeholder="@lang('admin.setting.map_key')">
					</div>
				</div>

				<div class="form-group row">
					<label for="fb_app_version" class="col-xs-2 col-form-label">@lang('admin.setting.fb_app_version')</label>
					<div class="col-xs-10">
						<input class="form-control" type="text" value="{{ Setting::get('fb_app_version')  }}" name="fb_app_version" required id="fb_app_version" placeholder="@lang('admin.setting.fb_app_version')">
					</div>
				</div>

				<div class="form-group row">
					<label for="fb_app_id" class="col-xs-2 col-form-label">@lang('admin.setting.fb_app_id')</label>
					<div class="col-xs-10">
						<input class="form-control" type="text" value="{{ Setting::get('fb_app_id')  }}" name="fb_app_id" required id="fb_app_id" placeholder="@lang('admin.setting.fb_app_id')">
					</div>
				</div>

				<div class="form-group row">
					<label for="fb_app_secret" class="col-xs-2 col-form-label">@lang('admin.setting.fb_app_secret')</label>
					<div class="col-xs-10">
						<input class="form-control" type="text" value="{{ Setting::get('fb_app_secret')  }}" name="fb_app_secret" required id="fb_app_secret" placeholder="@lang('admin.setting.fb_app_secret')">
					</div>
				</div>
				
				<div class="form-group row">
				<?php
				$start_hours = Setting::get('start_hour');
				$arr1 = explode(':',$start_hours);
				$start_h = $arr1[0];
				$start_m = $arr1[1];
				$end_hours = Setting::get('end_hour');
				$arr = explode(':',$end_hours);
				$end_h =$arr[0];
				$end_m =$arr[1];
				
				?>
					<label for="Working Hours" class="col-xs-2 col-form-label">@lang('admin.setting.working_hour')</label>
					<div class="col-xs-5 myclass">
						<label>@lang('admin.setting.start_hour'): </label><select name="start_hour">
						<option <?php if($start_h=='00'){echo "SELECTED";}?>  value="00">00</option>
						<option <?php if($start_h=='01'){echo "SELECTED";}?> value="01">01</option>
						<option <?php if($start_h=='02'){echo "SELECTED";}?> value="02">02</option>
						<option <?php if($start_h=='03'){echo "SELECTED";}?> value="03">03</option>
						<option <?php if($start_h=='04'){echo "SELECTED";}?> value="04">04</option>
						<option <?php if($start_h=='05'){echo "SELECTED";}?> value="05">05</option>
						<option <?php if($start_h=='06'){echo "SELECTED";}?> value="06">06</option>
						<option <?php if($start_h=='07'){echo "SELECTED";}?> value="07">07</option>
						<option <?php if($start_h=='08'){echo "SELECTED";}?> value="08">08</option>
						<option <?php if($start_h=='09'){echo "SELECTED";}?> value="09">09</option>
						<option <?php if($start_h=='10'){echo "SELECTED";}?> value="10">10</option>
						<option <?php if($start_h=='11'){echo "SELECTED";}?> value="11">11</option>
						<option <?php if($start_h=='12'){echo "SELECTED";}?> value="12">12</option>
						<option <?php if($start_h=='13'){echo "SELECTED";}?> value="13">13</option>
						<option <?php if($start_h=='14'){echo "SELECTED";}?> value="14">14</option>
						<option <?php if($start_h=='15'){echo "SELECTED";}?> value="15">15</option>
						<option <?php if($start_h=='16'){echo "SELECTED";}?> value="16">16</option>
						<option <?php if($start_h=='17'){echo "SELECTED";}?> value="17">17</option>
						<option <?php if($start_h=='18'){echo "SELECTED";}?> value="18">18</option>
						<option <?php if($start_h=='19'){echo "SELECTED";}?> value="19">19</option>
						<option <?php if($start_h=='20'){echo "SELECTED";}?> value="20">20</option>
						<option <?php if($start_h=='21'){echo "SELECTED";}?> value="21">21</option>
						<option <?php if($start_h=='22'){echo "SELECTED";}?> value="22">22</option>
						<option <?php if($start_h=='23'){echo "SELECTED";}?> value="23">23</option>
						</select>
						<select name="start_min">
						<option <?php if($start_m=='00'){echo "SELECTED";}?> value="00">00</option>
						<option <?php if($start_m=='01'){echo "SELECTED";}?> value="01">01</option>
						<option <?php if($start_m=='02'){echo "SELECTED";}?> value="02">02</option>
						<option <?php if($start_m=='03'){echo "SELECTED";}?> value="03">03</option>
						<option <?php if($start_m=='04'){echo "SELECTED";}?> value="04">04</option>
						<option <?php if($start_m=='05'){echo "SELECTED";}?> value="05">05</option>
						<option <?php if($start_m=='06'){echo "SELECTED";}?> value="06">06</option>
						<option <?php if($start_m=='07'){echo "SELECTED";}?> value="07">07</option>
						<option <?php if($start_m=='08'){echo "SELECTED";}?> value="08">08</option>
						<option <?php if($start_m=='09'){echo "SELECTED";}?> value="09">09</option>
						<option <?php if($start_m=='10'){echo "SELECTED";}?> value="10">10</option>
						<option <?php if($start_m=='11'){echo "SELECTED";}?> value="11">11</option>
						<option <?php if($start_m=='12'){echo "SELECTED";}?> value="12">12</option>
						<option <?php if($start_m=='13'){echo "SELECTED";}?>  value="13">13</option>
						<option <?php if($start_m=='14'){echo "SELECTED";}?> value="14">14</option>
						<option <?php if($start_m=='15'){echo "SELECTED";}?> value="15">15</option>
						<option <?php if($start_m=='16'){echo "SELECTED";}?> value="16">16</option>
						<option <?php if($start_m=='17'){echo "SELECTED";}?> value="17">17</option>
						<option <?php if($start_m=='18'){echo "SELECTED";}?> value="18">18</option>
						<option <?php if($start_m=='19'){echo "SELECTED";}?> value="19">19</option>
						<option <?php if($start_m=='20'){echo "SELECTED";}?> value="20">20</option>
						<option <?php if($start_m=='21'){echo "SELECTED";}?> value="21">21</option>
						<option <?php if($start_m=='22'){echo "SELECTED";}?> value="22">22</option>
						<option <?php if($start_m=='23'){echo "SELECTED";}?> value="23">23</option>
						<option <?php if($start_m=='24'){echo "SELECTED";}?> value="24">24</option>
						<option <?php if($start_m=='25'){echo "SELECTED";}?>  value="25">25</option>
						<option <?php if($start_m=='26'){echo "SELECTED";}?> value="26">26</option>
						<option <?php if($start_m=='27'){echo "SELECTED";}?> value="27">27</option>
						<option <?php if($start_m=='28'){echo "SELECTED";}?> value="28">28</option>
						<option <?php if($start_m=='29'){echo "SELECTED";}?> value="29">29</option>
						<option <?php if($start_m=='30'){echo "SELECTED";}?> value="30">30</option>
						<option <?php if($start_m=='31'){echo "SELECTED";}?> value="31">31</option>
						<option <?php if($start_m=='32'){echo "SELECTED";}?> value="32">32</option>
						<option <?php if($start_m=='33'){echo "SELECTED";}?> value="33">33</option>
						<option <?php if($start_m=='34'){echo "SELECTED";}?>  value="34">34</option>
						<option <?php if($start_m=='35'){echo "SELECTED";}?> value="35">35</option>
						<option <?php if($start_m=='36'){echo "SELECTED";}?> value="36">36</option>
						<option <?php if($start_m=='37'){echo "SELECTED";}?> value="37">37</option>
						<option <?php if($start_m=='38'){echo "SELECTED";}?> value="38">38</option>
						<option <?php if($start_m=='39'){echo "SELECTED";}?> value="39">39</option>
						<option <?php if($start_m=='40'){echo "SELECTED";}?> value="40">40</option>
						<option <?php if($start_m=='41'){echo "SELECTED";}?> value="41">41</option>
						<option <?php if($start_m=='42'){echo "SELECTED";}?> value="42">42</option>
						<option <?php if($start_m=='43'){echo "SELECTED";}?> value="43">43</option>
						<option <?php if($start_m=='44'){echo "SELECTED";}?> value="44">44</option>
						<option <?php if($start_m=='45'){echo "SELECTED";}?> value="45">45</option>
						<option <?php if($start_m=='46'){echo "SELECTED";}?> value="46">46</option>
						<option <?php if($start_m=='47'){echo "SELECTED";}?> value="47">47</option>
						<option <?php if($start_m=='48'){echo "SELECTED";}?> value="48">48</option>
						<option <?php if($start_m=='49'){echo "SELECTED";}?> value="49">49</option>
						<option <?php if($start_m=='50'){echo "SELECTED";}?> value="50">50</option>
						<option <?php if($start_m=='51'){echo "SELECTED";}?> value="51">51</option>
						<option <?php if($start_m=='52'){echo "SELECTED";}?> value="52">52</option>
						<option <?php if($start_m=='53'){echo "SELECTED";}?> value="53">53</option>
						<option <?php if($start_m=='54'){echo "SELECTED";}?> value="54">54</option>
						<option <?php if($start_m=='55'){echo "SELECTED";}?> value="55">55</option>
						<option <?php if($start_m=='56'){echo "SELECTED";}?> value="56">56</option>
						<option <?php if($start_m=='57'){echo "SELECTED";}?> value="57">57</option>
						<option <?php if($start_m=='58'){echo "SELECTED";}?> value="58">58</option>
						<option <?php if($start_m=='59'){echo "SELECTED";}?> value="59">59</option>
						</select>
					</div>
					<div class="col-xs-5 myclass">  
						<label>@lang('admin.setting.end_hour'): </label><select name="end_hour">
						<option <?php if($end_h=='00'){echo "SELECTED";}?>  value="00">00</option>
						<option <?php if($end_h=='01'){echo "SELECTED";}?> value="01">01</option>
						<option <?php if($end_h=='02'){echo "SELECTED";}?> value="02">02</option>
						<option <?php if($end_h=='03'){echo "SELECTED";}?> value="03">03</option>
						<option <?php if($end_h=='04'){echo "SELECTED";}?> value="04">04</option>
						<option <?php if($end_h=='05'){echo "SELECTED";}?> value="05">05</option>
						<option <?php if($end_h=='06'){echo "SELECTED";}?> value="06">06</option>
						<option <?php if($end_h=='07'){echo "SELECTED";}?> value="07">07</option>
						<option <?php if($end_h=='08'){echo "SELECTED";}?> value="08">08</option>
						<option <?php if($end_h=='09'){echo "SELECTED";}?> value="09">09</option>
						<option <?php if($end_h=='10'){echo "SELECTED";}?> value="10">10</option>
						<option <?php if($end_h=='11'){echo "SELECTED";}?> value="11">11</option>
						<option <?php if($end_h=='12'){echo "SELECTED";}?> value="12">12</option>
						<option <?php if($end_h=='13'){echo "SELECTED";}?> value="13">13</option>
						<option <?php if($end_h=='14'){echo "SELECTED";}?> value="14">14</option>
						<option <?php if($end_h=='15'){echo "SELECTED";}?> value="15">15</option>
						<option <?php if($end_h=='16'){echo "SELECTED";}?> value="16">16</option>
						<option <?php if($end_h=='17'){echo "SELECTED";}?> value="17">17</option>
						<option <?php if($end_h=='18'){echo "SELECTED";}?> value="18">18</option>
						<option <?php if($end_h=='19'){echo "SELECTED";}?> value="19">19</option>
						<option <?php if($end_h=='20'){echo "SELECTED";}?> value="20">20</option>
						<option <?php if($end_h=='21'){echo "SELECTED";}?> value="21">21</option>
						<option <?php if($end_h=='22'){echo "SELECTED";}?> value="22">22</option>
						<option <?php if($end_h=='23'){echo "SELECTED";}?> value="23">23</option>
						</select>
						<select name="end_min">
						<option <?php if($end_m=='00'){echo "SELECTED";}?> value="00">00</option>
						<option <?php if($end_m=='01'){echo "SELECTED";}?> value="01">01</option>
						<option <?php if($end_m=='02'){echo "SELECTED";}?> value="02">02</option>
						<option <?php if($end_m=='03'){echo "SELECTED";}?> value="03">03</option>
						<option <?php if($end_m=='04'){echo "SELECTED";}?> value="04">04</option>
						<option <?php if($end_m=='05'){echo "SELECTED";}?> value="05">05</option>
						<option <?php if($end_m=='06'){echo "SELECTED";}?> value="06">06</option>
						<option <?php if($end_m=='07'){echo "SELECTED";}?> value="07">07</option>
						<option <?php if($end_m=='08'){echo "SELECTED";}?> value="08">08</option>
						<option <?php if($end_m=='09'){echo "SELECTED";}?> value="09">09</option>
						<option <?php if($end_m=='10'){echo "SELECTED";}?> value="10">10</option>
						<option <?php if($end_m=='11'){echo "SELECTED";}?> value="11">11</option>
						<option <?php if($end_m=='12'){echo "SELECTED";}?> value="12">12</option>
						<option <?php if($end_m=='13'){echo "SELECTED";}?>  value="13">13</option>
						<option <?php if($end_m=='14'){echo "SELECTED";}?> value="14">14</option>
						<option <?php if($end_m=='15'){echo "SELECTED";}?> value="15">15</option>
						<option <?php if($end_m=='16'){echo "SELECTED";}?> value="16">16</option>
						<option <?php if($end_m=='17'){echo "SELECTED";}?> value="17">17</option>
						<option <?php if($end_m=='18'){echo "SELECTED";}?> value="18">18</option>
						<option <?php if($end_m=='19'){echo "SELECTED";}?> value="19">19</option>
						<option <?php if($end_m=='20'){echo "SELECTED";}?> value="20">20</option>
						<option <?php if($end_m=='21'){echo "SELECTED";}?> value="21">21</option>
						<option <?php if($end_m=='22'){echo "SELECTED";}?> value="22">22</option>
						<option <?php if($end_m=='23'){echo "SELECTED";}?> value="23">23</option>
						<option <?php if($end_m=='24'){echo "SELECTED";}?> value="24">24</option>
						<option <?php if($end_m=='25'){echo "SELECTED";}?>  value="25">25</option>
						<option <?php if($end_m=='26'){echo "SELECTED";}?> value="26">26</option>
						<option <?php if($end_m=='27'){echo "SELECTED";}?> value="27">27</option>
						<option <?php if($end_m=='28'){echo "SELECTED";}?> value="28">28</option>
						<option <?php if($end_m=='29'){echo "SELECTED";}?> value="29">29</option>
						<option <?php if($end_m=='30'){echo "SELECTED";}?> value="30">30</option>
						<option <?php if($end_m=='31'){echo "SELECTED";}?> value="31">31</option>
						<option <?php if($end_m=='32'){echo "SELECTED";}?> value="32">32</option>
						<option <?php if($end_m=='33'){echo "SELECTED";}?> value="33">33</option>
						<option <?php if($end_m=='34'){echo "SELECTED";}?>  value="34">34</option>
						<option <?php if($end_m=='35'){echo "SELECTED";}?> value="35">35</option>
						<option <?php if($end_m=='36'){echo "SELECTED";}?> value="36">36</option>
						<option <?php if($end_m=='37'){echo "SELECTED";}?> value="37">37</option>
						<option <?php if($end_m=='38'){echo "SELECTED";}?> value="38">38</option>
						<option <?php if($end_m=='39'){echo "SELECTED";}?> value="39">39</option>
						<option <?php if($end_m=='40'){echo "SELECTED";}?> value="40">40</option>
						<option <?php if($end_m=='41'){echo "SELECTED";}?> value="41">41</option>
						<option <?php if($end_m=='42'){echo "SELECTED";}?> value="42">42</option>
						<option <?php if($end_m=='43'){echo "SELECTED";}?> value="43">43</option>
						<option <?php if($end_m=='44'){echo "SELECTED";}?> value="44">44</option>
						<option <?php if($end_m=='45'){echo "SELECTED";}?> value="45">45</option>
						<option <?php if($end_m=='46'){echo "SELECTED";}?> value="46">46</option>
						<option <?php if($end_m=='47'){echo "SELECTED";}?> value="47">47</option>
						<option <?php if($end_m=='48'){echo "SELECTED";}?> value="48">48</option>
						<option <?php if($end_m=='49'){echo "SELECTED";}?> value="49">49</option>
						<option <?php if($end_m=='50'){echo "SELECTED";}?> value="50">50</option>
						<option <?php if($end_m=='51'){echo "SELECTED";}?> value="51">51</option>
						<option <?php if($end_m=='52'){echo "SELECTED";}?> value="52">52</option>
						<option <?php if($end_m=='53'){echo "SELECTED";}?> value="53">53</option>
						<option <?php if($end_m=='54'){echo "SELECTED";}?> value="54">54</option>
						<option <?php if($end_m=='55'){echo "SELECTED";}?> value="55">55</option>
						<option <?php if($end_m=='56'){echo "SELECTED";}?> value="56">56</option>
						<option <?php if($end_m=='57'){echo "SELECTED";}?> value="57">57</option>
						<option <?php if($end_m=='58'){echo "SELECTED";}?> value="58">58</option>
						<option <?php if($end_m=='59'){echo "SELECTED";}?> value="59">59</option>
						</select>
					</div>
				</div>
				
				

				<div class="form-group row">
					<label for="zipcode" class="col-xs-2 col-form-label"></label>
					<div class="col-xs-10">
						<button type="submit" class="btn btn-primary">@lang('admin.setting.Update_Site_Settings')</button>
					</div>
				</div>
			</form>
		</div>
    </div>
</div>
@endsection
