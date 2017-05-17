 <option value="">Xã/Phường</option>
@foreach ($ward as $ward)
	 <option value="{{$ward->wardid}}">{{$ward->name}}</option>
@endforeach