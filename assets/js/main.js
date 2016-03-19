$(document).ready(function() {
    $.fn.editable.defaults.success = function() { $(this).show() };
    $.fn.editable.defaults.mode = 'popup';     
    
    //make itens editables
    $('#item1').editable({
        pk: $(this).data('pk'),
        url: 'edit.php'
    });
    
    $('#item2').editable({
        
    });
    
    $('#item3').editable({
        
    });
    
    $('#item4').editable({
        
    });
    
    $('#item5').editable({
        
    });
    
    $('#item6').editable({
        
    });
    
    $('#item7').editable({
        
    });
    
    $('#item8').editable({
        
    });
    
    $('#item9').editable({
        
    });
    
    $('#item10').editable({
        
    });
});