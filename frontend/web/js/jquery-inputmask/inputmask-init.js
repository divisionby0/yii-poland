$('document').ready(function(){
    $('.form-mask-phone').inputmask({
            mask: '+380 (99) 999-99-99'
        }
    );

    $('.form-mask-ptn').inputmask({
            mask: '9999/9999/9999'
        }
    );

    $('.form-mask-email').inputmask({
            mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
            greedy: false,
            onBeforePaste: function (pastedValue, opts) {
                pastedValue = pastedValue.toLowerCase();
                return pastedValue.replace("mailto:", "");
            },
            definitions: {
                '*': {
                    validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
                    cardinality: 1,
                    casing: "lower"
                }
            }
        }
    );
});
