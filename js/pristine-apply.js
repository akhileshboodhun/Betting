form.addEventListener('submit', function (e) {
    e.preventDefault();

    var pristine = new Pristine(form,{
            classTo: 'form-group',
            errorClass: 'has-danger',
            successClass: 'has-success',
            errorTextParent: 'form-group',       
            errorTextTag: 'div',    
            errorTextClass: 'text-help'
        });
        
    var valid = pristine.validate();
});