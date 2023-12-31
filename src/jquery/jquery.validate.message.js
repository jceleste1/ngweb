jQuery.extend(jQuery.validator.messages, {
    required: "Campo obrigatório.",
    remote: "Campo com valor incorreto.",
    email: "Email inválido",
    url: "URL inválida.",
    date: "Data inválida.",
    dateISO: "Data (ISO) inválida.",
    number: "Número inválido.",
    digits: "Insira apenas números.",
    creditcard: "Cartão de crédito inválido.",
    equalTo: "Insira o mesmo valor novamente.",
    accept: "Insira um valor com uma extensão válida.",
    maxlength: jQuery.validator.format("Insira no máximo {0} caracteres."),
    minlength: jQuery.validator.format("Insira ao menos {0} caracteres."),
    rangelength: jQuery.validator.format("Insira um valor entre {0} e {1} caracteres."),
    range: jQuery.validator.format("Insira um valor entre {0} e {1}."),
    max: jQuery.validator.format("Insira um valor menor ou igual a {0}."),
    min: jQuery.validator.format("Insira um valor maior ou igual a {0}.")
});