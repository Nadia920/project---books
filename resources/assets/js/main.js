import $ from 'jquery';
window.$ = window.jQuery = $;
import 'bootstrap';

var book;
    var author;
    var page = 1;

$(document).ready(function() {

    $(document).on('click', '.js-page', function(){
        $(".js-page").removeClass('active');
        $(this).addClass('active');
        page = $(this).text();
    })

$(document).on('change', '.perpage', function(e){
	
    e.preventDefault();
        var page_number = $(this).data('page-number');
        var current_query;

        if($(this).data('query')){
            current_query = '?' + $(this).data('query');
        } else {
            current_query = '';
        }

        $.ajax({
           headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           method: "POST",
           url: '/paginate',
           data: {
				current_query: current_query,
				page_number:page_number,

				limit: $('.perpage').val()
			},
           dataType: "json",
           success: function (response) {
			$('#authors').empty();
            $('#paginattion').empty();
			var rows = [], rows2=[];
             $.each(response.data, function (index, value) {
                let bookList = value.books.map(function(book) {
                    return `<li>${book.book_name}</li>`;
                }).join('');

				rows.push(`
					<div style="background:#fff; width: 300px; margin:10px; padding:10px;">
						<h3>${value.author_fio}</h3>
						<p>Книги:</p>
					    <ul>${bookList}</ul>
					</div>
				`)
			 })


			 $('#authors').append(rows);



             for(var page_number = 1; page_number <= response.total_pages; page_number++){
                rows2.push(`
                <li style="display: flex; padding: 10px;" class="page-item">
                <a class="js-page page-link" href="#" data-page-number="${page_number }">
                     ${page_number }
                </a>
                </li>
				`)
             }
             $('#paginattion').append(rows2);
           }
        })
})


$(document).on('change', '.perpageBook', function(e){

    e.preventDefault();
        var page_number = $(this).data('page-number');
        var current_query;

        if($(this).data('query')){
            current_query = '?' + $(this).data('query');
        } else {
            current_query = '';
        }

        $.ajax({
           headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           method: "POST",
           url: '/booksPaginate',
           data: {
				current_query: current_query,
				page_number:page_number,

				limit: $('.perpageBook').val()
			},
           dataType: "json",
           success: function (response) {
			$('#books').empty();
            $('#paginattionBook').empty();
			var rows = [], rows2=[];
             $.each(response.data, function (index, value) {
				rows.push(`
                <div style="background:#fff; width: 300px; margin:10px; padding:10px;">
                <h3>${value.book_name}</h3>
                <img width="100" height="150" src="/storage/${value.img_book}"/>
                <p>${value.author_fio}</p>
                <button class="btn btn-success send js-order" data-toggle="modal" data-target="#send" type="button" data-author="${value.author_fio}" data-book=${value.book_name}>оформить заявку на книгу</button>
            </div>
				`)
			 })


			 $('#books').append(rows);



             for(var page_number = 1; page_number <= response.total_pages; page_number++){

                if (page_number == page) {
                    rows2.push(`
                        <li style="display: flex; padding: 10px;" class="page-itemBook">
                        <a class="js-page page-linkBook active" href="#" data-page-number="${page_number }">
                            ${page_number }
                        </a>
                        </li>
                    `)
                }
                else {
                    rows2.push(`
                        <li style="display: flex; padding: 10px;" class="page-itemBook">
                        <a class="js-page page-linkBook" href="#" data-page-number="${page_number }">
                            ${page_number }
                        </a>
                        </li>
				`)
                }
                
             }
             $('#paginattionBook').append(rows2);
           }
        })
})



    $(document).on('click', '.page-link', function(e){
        e.preventDefault();
        var page_number = $(this).data('page-number');
        var current_query;

        if($(this).data('query')){
            current_query = '?' + $(this).data('query');
        } else {
            current_query = '';
        }

        $.ajax({
           headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           method: "POST",
           url: '/paginate',
           data: {
				current_query: current_query,
				page_number:page_number,
				limit: $('.perpage').val()
			},
           dataType: "json",
           success: function (response) {
			$('#authors').empty();

			var rows = [], rows2=[];
             $.each(response.data, function (index, value) {
                let bookList = value.books.map(function(book) {
                    return `<li>${book.book_name}</li>`;
                }).join('');

				rows.push(`
					<div style="background:#fff; width: 300px; margin:10px; padding:10px;">
						<h3>${value.author_fio}</h3>
						<p>Книги:</p>
					    <ul>${bookList}</ul>
					</div>
				`)
			 })
			 $('#authors').append(rows);





           }
        })
    })





    $(document).on('click', '.page-linkBook', function(e){
        e.preventDefault();
        var page_number = $(this).data('page-number');
        var current_query;

        if($(this).data('query')){
            current_query = '?' + $(this).data('query');
        } else {
            current_query = '';
        }

        $.ajax({
           headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           method: "POST",
           url: '/booksPaginate',
           data: {
				current_query: current_query,
				page_number:page_number,
				limit: $('.perpageBook').val()
			},
           dataType: "json",
           success: function (response) {
			$('#books').empty();
            $('#paginattionBook').empty();

			var rows = [], rows2=[];
             $.each(response.data, function (index, value) {
              
				rows.push(`
                <div style="background:#fff; width: 300px; margin:10px; padding:10px;">
                <h3>${value.book_name}</h3>
                <img width="100" height="150" src="/storage/${value.img_book}"/>
                <p>${value.author_fio}</p>
                <button class="btn btn-success send js-order" data-toggle="modal" data-target="#send" type="button" data-author="${value.author_fio}" data-book=${value.book_name}>оформить заявку на книгу</button>
            </div>
				`)
			 })
			 $('#books').append(rows);

             for(var page_number = 1; page_number <= response.total_pages; page_number++){

                if (page_number == page) {
                    rows2.push(`
                    <li style="display: flex; padding: 10px;" class="page-itemBook">
                    <a class="js-page page-linkBook active" href="#" data-page-number="${page_number }">
                         ${page_number }
                    </a>
                    </li>
                    `)
                }
                else {
                    rows2.push(`
                    <li style="display: flex; padding: 10px;" class="page-itemBook">
                    <a class="js-page page-linkBook" href="#" data-page-number="${page_number }">
                         ${page_number }
                    </a>
                    </li>
                    `)
                }
             }
             $('#paginattionBook').append(rows2);

           }
        })
    })










    function getParams(book, author){
        var dataObj;

        return dataObj = {
            name: $('.name').val(),
            email: $('.email').val(),
      dateTime: new Date(),
            book: book,
            author: author
        }
    }


	$('.actionButton').on('click', function() {
        var dataObj = getParams(book, author),
            formData = new FormData();


        for(var key in dataObj){
            formData.append(key, dataObj[key]);
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
      method: "POST",
      url: '/send',
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
               alert('send!')
      }
    });
    })

    $('.send').on('click', function() {
        book = $(this).data('book');
        author = $(this).data('author');
    })

})
