$('.select_sort').on('change', function(){
    $value = this.selectedOptions[0].value;
    $name = this.selectedOptions[0].attributes['name'].value;

    var state = { 
        'sort': $name, 
        'method': $value 
    }



    window.history.pushState(state, '', url);
});