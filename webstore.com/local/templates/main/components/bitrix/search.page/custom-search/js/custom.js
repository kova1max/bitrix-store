$('.select_sort').on('change', function(){
    url = this.selectedOptions[0].dataset.url;
    window.location.href = url;
});