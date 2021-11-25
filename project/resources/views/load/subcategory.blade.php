<option value="">Select Sub Category</option>
@foreach($cat->subs as $sub)
<option value="{{ $sub->id }}">{{ $sub->name }}</option>
@endforeach