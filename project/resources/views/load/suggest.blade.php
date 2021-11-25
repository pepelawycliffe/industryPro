@foreach($prods as $prod)
	<div class="docname">
		<a href="{{ route('front.product', $prod->slug) }}">
			{{ strlen($prod->name) > 26 ? substr($prod->name,0,26).'...' : $prod->name  }} - {{ $prod->showPrice() }}
		</a>
	</div> 
@endforeach