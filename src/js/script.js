window.onload = ()=>{
    //document.addEventListener('submit',validateForm(event,"agencyRegisterForm"));
    //document.addEventListener('submit',(event)=>{event.preventDefault()});

}

/**
 * Validate the form with the given ID.
 *
 * @param {string} formId - The ID of the form to validate
 * @return {undefined} 
 */
function validateForm(formId){
    
    const form = document.getElementById(formId);
    if(getFormInputs(form)){
        retun ;
    }else{
        event.preventDefault()
    }
        

}

/**
 * Retrieves form inputs and validates their format.
 *
 * @param {Object} form - The form element
 * @return {boolean} Whether all inputs have valid format
 */
function getFormInputs(form){
    let flag = true;
    const inputsAndValidationJson = require('./validations.json');
    const inputs = inputsAndValidationJson.inputs;
    inputs.forEach(usuario => {
        let inputsValue = form.getElementsByTagName(usuario.name);
        if(!validateInputsFormat(usuario.type, inputsValue)){
            flag = false; 
        }
    });
    return flag;
    

}

/**
 * Validates the format of the input value based on the specified type.
 *
 * @param {string} type - the type of input value to validate
 * @param {string} inputValue - the input value to be validated
 * @return {boolean} true if the input value matches the specified format, false otherwise
 */
function validateInputsFormat (type, inputValue){
    let regex   = null;
    let regex2  = null;
    let flag    = false;
    switch (type) {
        case "text":
            //formato de texto
            regex =  /^[a-zA-Z\s]+$/;
            break;
        case "cifNif":
            //formato de CIF o NIF
            regex = /^[A-HJNP-SUW-Z]\d{7}[0-9A-J]$/;
            regex2 = /^[0-9XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/i;
            break;
        case "mail":
            //formato de email
            regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            break;
        case "tel":
            //10 digitos
            regex = /^\d{9}$/;
            break;
        case "password":
            //longitud mínima de 4 caracteres
            regex = /^.{4,}$/;
            break;
    
        
    }
    if(type == "cifNif"){
        if(regex.test(inputValue) || regex2.test(inputValue)){
            flag = true;
        }
    }else{
        if(regex.test(inputValue)){
            flag = true;
        }
    }
    return flag;

}