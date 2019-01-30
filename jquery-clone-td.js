$(function () {
    $('#btnAdd').click(function () {
        var num     = $('.clonedInput').length, // Cek berapa banyak form yang telah kita duplikasi
            newNum  = new Number(num + 1),      // Tambahkan nilai 1 untuk setiap ID duplikasi
            newElem = $('#entry' + num).clone().attr('id', 'entry' + newNum).fadeIn('slow'); // Buat elemen baru dengan fungsi clone(), dan manipulasi ID dengan nilai newNum
        // H2 - section
        newElem.find('.heading-reference').attr('id', 'ID' + newNum + '_reference').attr('name', 'ID' + newNum + '_reference').html('Entry #' + newNum);
 
        // Nama depan - text
        newElem.find('.label_fn').attr('for', 'ID' + newNum + '_first_name');
        newElem.find('.input_fn').attr('id', 'ID' + newNum + '_first_name').attr('name', 'ID' + newNum + '_first_name').val('');
 
        // Nama belakang - text
        newElem.find('.label_ln').attr('for', 'ID' + newNum + '_last_name');
        newElem.find('.input_ln').attr('id', 'ID' + newNum + '_last_name').attr('name', 'ID' + newNum + '_last_name').val('');
 
        // Status- checkbox
        newElem.find('.label_checkboxitem').attr('for', 'ID' + newNum + '_checkboxitem');
        newElem.find('.input_checkboxitem').attr('id', 'ID' + newNum + '_checkboxitem').attr('name', 'ID' + newNum + '_checkboxitem').val([]);
 
        // Email - text
        newElem.find('.label_email').attr('for', 'ID' + newNum + '_email_address');
        newElem.find('.input_email').attr('id', 'ID' + newNum + '_email_address').attr('name', 'ID' + newNum + '_email_address').val('');
 
        // Twitter handle - append and text
        newElem.find('.label_twt').attr('for', 'ID' + newNum + '_twitter_handle');
        newElem.find('.input_twt').attr('id', 'ID' + newNum + '_twitter_handle').attr('name', 'ID' + newNum + '_twitter_handle').val('');
 
    // Insert elemen baru setelah field input duplikasi yang terakhir 
        $('#entry' + num).after(newElem);
        $('#ID' + newNum + '_title').focus();
 
    // Enable tombol remove
        $('#btnDel').attr('disabled', false);
 
    // Sesuaikan nilai '5' sesuai kebutuhan untuk mengatur jumlah duplikasi maksimal yang diperbolehkan.
        if (newNum == 5)
        $('#btnAdd').attr('disabled', true).prop('value', "Batas maksimal duplikasi");<br>   });