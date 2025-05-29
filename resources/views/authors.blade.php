@extends('index')

@section('content')
<div class="number_elements">
    <p>Количество элементов на странице</p>
    <select class="perpage amount_elements custom-select number_elements_select" name="perpage">
        <option value="2">2</option>
        <option value="4" selected>4</option>
    </select>
</div>
<div id="authors">
    @foreach ($data as $key => $value )
        <div style="background:#fff; width: 300px; margin:10px; padding:10px;">
            <h3>{{$value->author_fio}}</h3>
			<p>Книги:</p>
            <ul>
                @foreach ($value->books as $key => $book)
                    <li>{{$book->book_name}}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
	<hr>

</ul>
</div>
<ul id="paginattion" style="display: flex; padding: 10px;" class="paginator">
    @for($page_number = 1; $page_number <= $total_pages; $page_number++)
        <li style="display: flex; padding: 10px;" class="page-item @php echo isset($_GET['page-number']) && $_GET['page-number'] == $page_number ? 'active' : ''; @endphp">
        <a class="js-page page-link" href="#" data-page-number="@php echo $page_number; @endphp"{{$current_query }}>
             {{$page_number }}
        </a>
        </li>
    @endfor
@endsection


