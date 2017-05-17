 <option value="">Quận/Huyện</option>
@foreach ($district as $district)
	 <option value="{{$district->districtid}}">{{$district->name}}</option>
@endforeach