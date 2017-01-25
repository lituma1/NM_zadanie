

$(function () {
    

    var form = $('form');

    form.on('submit', function (event) {
        
        
        var rows = $('input[name=rows]');
        var columns = $('input[name=columns]');
        
        var numberOfRows = rows.val();
        var numberOfColumns = columns.val();
        
        
        if(numberOfRows*numberOfColumns > 1000){
            event.preventDefault();
            $('div.error_message').text('Iloczyn liczby wierszy i kolumn\n\
                                             nie może być większy niż 1000');
        }
        if(!numberOfRows || !numberOfColumns){
            event.preventDefault();
            $('div.error_message').text('Proszę wprowadzić jakieś dane');
        }
        if(/^[0-9]*$/.test(numberOfRows) == false || /^[0-9]*$/.test(numberOfColumns) == false){
            event.preventDefault();
            $('div.error_message').text('proszę wprowadzić liczby całkowite dodatnie');
        }
        
        
      
    });

});


