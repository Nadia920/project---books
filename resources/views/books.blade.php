@extends('index')
@section('content')
<div class="number_elements">
    <p>Количество элементов на странице</p>
    <select class="perpageBook amount_elements custom-select" name="perpageBook">
        <option class="dropdown-item" value="2">2</option>
        <option class="dropdown-item" value="4" selected>4</option>
    </select>
</div>
<div id="books">
    @foreach ($data as $key => $value )
        <div style="background:#fff; width: 300px; margin:10px; padding:10px;">
            <h3>{{$value->book_name}}</h3>
            <img width="100" height="150" src="/storage/{{$value->img_book}}"/>
            <p>{{$value->author_fio}}</p>
            <button class="btn btn-success send js-order" data-toggle="modal" data-target="#send" type="button" data-author="{{$value->author_fio}}" data-book={{$value->book_name}}>оформить заявку на книгу</button>
        </div>
    @endforeach
</div>

<ul id="paginattionBook" style="display: flex; padding: 10px;" class="paginator">
    @for($page_number = 1; $page_number <= $total_pages; $page_number++)
        <li style="display: flex; padding: 10px;" class="page-itemBook @php echo isset($_GET['page-number']) && $_GET['page-number'] == $page_number ? 'active' : ''; @endphp">
            <a class="js-page page-linkBook" href="#" data-page-number="@php echo $page_number; @endphp"{{$current_query }}>
                {{$page_number }}
            </a>
        </li>
    @endfor
</ul>
@endsection


