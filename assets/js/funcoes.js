
function filtroCategoriaConvenio(e,obj){
      e.stopPropagation();
      e.preventDefault();

      document.location=$(obj).val();

      return false;

}
function abrePdf(el){
       var valor = el.value;
        window.open(valor);
    }


function filtroBuscaOrdenacao(e,obj){
      e.stopPropagation();
      e.preventDefault();

      document.location=$(obj).val();

      return false;
}
function closeModal1(idModal){
    $('#'+idModal).modal('hide');
}

function resetReCAPTCHAv3(idform) {
    $('input[name=g-recaptcha-response]').each(function(){
        var _site_key = $(this).attr('site_key');
        var _action = $(this).attr('action');
        var _id = $(this).attr('id');
        if(isNaN(grecaptcha) && isNaN(_id) && isNaN(_action) && isNaN(_site_key)){
            if(idform){
                grecaptcha.execute(_site_key, { action: _action }).then(function (token) {
                    var recaptchaResponse = document.getElementById(_id);
                    recaptchaResponse.value = token;
                });
            }else{
                grecaptcha.ready(function () {
                    grecaptcha.execute(_site_key, { action: _action }).then(function (token) {
                        var recaptchaResponse = document.getElementById(_id);
                        recaptchaResponse.value = token;
                    });
                });
            }
        }
    });
}

function esconder(){
    if($('#show_hide_password input').attr("type") == "text"){
        $('#show_hide_password input').attr('type', 'password');
        $('#show_hide_password i').addClass( "fa-eye-slash" );
        $('#show_hide_password i').removeClass( "fa-eye" );
    }else if($('#show_hide_password input').attr("type") == "password"){
        $('#show_hide_password input').attr('type', 'text');
        $('#show_hide_password i').removeClass( "fa-eye-slash" );
        $('#show_hide_password i').addClass( "fa-eye" );
    }
    return false;
}
$(function() {
   
    setTimeout(resetReCAPTCHAv3,1000);

    function verificaTela(){
        if(parseFloat(($(window).height()+'').replace('px',''))>((parseFloat(($("#maincontent").height()+'').replace('px',''))-parseFloat(($("header").height()+'').replace('px','')))+parseFloat(($("header").height()+'').replace('px',''))+parseFloat(($("footer").height()+'').replace('px','')))){ 
            $("footer").css('position','absolute');
        }else{
    
            $("footer").css('position','relative');
        }
    }
    setInterval(verificaTela,2000);
    $(document).ready(function() {
        verificaTela();
    });
});
//FUNÇÃO ANEXAR DOCUMENTOS DE REQUERIMENTO


            
$.extend($.datepicker, { afterShow: function(event) {
    $.datepicker._getInst(event.target).dpDiv.css('z-index', 9999);
}});
$.datepicker.regional['pt_br'] = {
    prevText: '<Ant',
    nextText: 'Próx>',
    
    dayNames: ['Domingo', 'Segunda', 'Terça', 'Quata', 'Quita', 'Sexta', 'Sábado'],
    dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
    dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    
    weekHeader: 'Не',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['pt_br']);

function datepicker(){
            
            $('input.date').datepicker().focus(function (event) {
                    $.datepicker.afterShow(event);
            });
            $('input.date48notw').datepicker({ minDate: 2,  beforeShowDay: function(date){ return [date.getDay() !== 6 && date.getDay() !== 0 && date.getMonth()<=(new Date()).getMonth()+1];}});
}

function serializaRepassacampo(THISLINK,CAMPOR){
    var vURL = '';
     if($(THISLINK).attr('repassaCampo')!=undefined){
            var arrayCampos = ($(THISLINK).attr('repassaCampo')).split(',');
            for(c in arrayCampos){
                var campo = $(THISLINK).parents("form").eq(0).find('[name='+arrayCampos[c]+']');
                if(CAMPOR===undefined || (CAMPOR!==undefined && arrayCampos[c]==CAMPOR)){
                    var tipoCampo = campo.prop('type');
                    var valorCampo = serializaCampo(campo);
                    if(valorCampo!==undefined){
                        vURL+= '&'+arrayCampos[c]+'='+replaceAll(encodeURIComponent(valorCampo)+'','%2F','/');
                    }
                }
           }
        }
        return vURL;
}

    function serializaCampo(campo){
        if($(campo).length){
            if($(campo).find("option").length){
                return ($(campo).find("option:selected").prop('value')!='' ? $(campo).find("option:selected").val() : '');
            }else{
                var tipoCampo = $(campo).prop('type');
                if(tipoCampo!==undefined){
                    if(tipoCampo=='radio' || tipoCampo=='checkbox'){
                        return ($(campo).prop('checked') ? $(campo).val() : '');
                    }else{
                        if(tipoCampo.indexOf('select')>-1){
                            return ($(campo).find("option:selected").prop('value')!='' ? $(campo).find("option:selected").val() : '');
                        }else{
                            return $(campo).val();
                        }
                    }
                }
            }
        }else{
            return '';
        }
    }
    
    function redirecttoHome(){
        document.location.href = './';
    }

    var atualizaAvisosVar = null; 
    function atualizaAvisos(){
       $.ajax({
                url: "./&versao=testar"
        }).done(function(data) {
            if($('body').attr('versao')!=undefined && data!=undefined && data!=$('body').attr('versao')){
                showAlert('<strong>Houve uma atualização no website</strong><br/><br/>É importante atualizar!<br/>Caso esteja fazendo algo importante conclua e depois confirme aqui.',document.location.href,true);
                clearInterval(atualizaAvisosVar);
                atualizaAvisosVar = setTimeout(atualizaAvisos,60000);
            }else{
                clearInterval(atualizaAvisosVar);
                atualizaAvisosVar = setTimeout(atualizaAvisos,10000);
            }
            
        });
    }
(function($) {
  "use strict"; // Start of use strict
  
    atualizaAvisosVar = setTimeout(atualizaAvisos,10000);
        
  
  $('#mainNav .dropdown-submenu a[data-toggle=dropdown]').unbind("click").bind("click", function(e){
        $('#mainNav').find('a.active').removeClass('active');
        $('#mainNav').find('ul.dropdown-menu').removeClass('show');
        $(this).toggleClass('active');
        if($(this).hasClass('active')){
            $(this).parents('ul.dropdown-menu').addClass('show'); 
            $(this).parents('ul.dropdown-menu').prev('a').addClass('active'); 
            $(this).next('ul.dropdown-menu').addClass('show'); 
        }
        e.stopPropagation();
        e.preventDefault();
  });
  
  $('#mainNav .dropdown-submenu a').not('[data-toggle=dropdown]').unbind("click").bind("click", function(e){
    verificaURL();

    $('#mainNav').find('a.active').removeClass('active');
    $('#mainNav').find('ul.dropdown-menu').removeClass('show');
});

var lasturl = null;
function verificaURL(){
    setTimeout(function(){
        var url = document.location.href; 
        if(lasturl!=url){
                      if(strpos(url,'#')!==false){
                          var ancora = document.location.href.substring(strpos(url,'#'),url.length);
                          $('html, body').stop().animate({scrollTop: $(ancora).offset().top-200}, 1000,'swing');
                          $(ancora).addClass('active');
                      }
          lasturl = url;  
        }
    },100);
}

verificaURL();

 
  var clickEvent = ((document.ontouchstart!==null) ? 'click':'click');
  
  $('body').delegate('.enquente-item',clickEvent,function(evt){
      $(this).parent().parent().find('a').removeClass('active');
      $(this).parent().parent().find('input').removeAttr('checked');
      $(this).find('input').attr('checked','checked');
      $(this).addClass('active');
	  evt.stopPropagation();
      return false;
  });
		
  $('body').delegate('.showorhide',clickEvent,function(evt){
      var obj = $(this).attr('href');
	  
	  if($(obj).length){
		  if( $(obj).hasClass('hide')){
			$(obj).removeClass('hide');
		  }else{
			$(obj).addClasss('hide');
		  }
	  }
	  evt.stopPropagation();
      return false;
  });
  
$("body").delegate('a[elementRefresh]',clickEvent,function(evt){
    if($(this).attr('elementRefresh')!='' && $(this).attr('elementRefresh')!=undefined){
        var elementRefresh = null;
        eval('elementRefresh = '+$(this).attr('elementRefresh'));
		if(elementRefresh.url==undefined){
			elementRefresh.url = $(this).attr('href');
		}
		$(elementRefresh.element).parent().addClass('closed');
		setTimeout(function(){
			atualizarElemento(elementRefresh.element,elementRefresh.url+' '+elementRefresh.element,function(){
				$(elementRefresh.element).parent().removeClass('closed');
			});
		},500);
		evt.stopPropagation();
		return false;
    }
});

$("body").delegate('input[elementRefresh], select[elementRefresh], textarea[elementRefresh]','change',function(evt){
    var FROM = $(evt.currentTarget).parents('form').eq(0);
    if($(this).attr('elementRefresh')!='' && $(this).attr('elementRefresh')!=undefined){
         var elementRefresh = null;
        eval('elementRefresh = '+$(this).attr('elementRefresh'));
        var loadding = false;
        if(elementRefresh.loading && $(elementRefresh.loading).length){
            $.each($(elementRefresh.loading),function(i,campo){
                if($(campo).prop('type')){
                    if($(campo).prop('type').indexOf('select')>-1){
                        $(campo).find("option:selected").removeAttr('selected');
                        $(campo).prepend('<option class="createAsLoading" selected=true>Carregadno...</option>');
                        return ($(campo).find("option:selected").prop('value')!='' ? $(campo).find("option:selected").val() : '');
                    }else{
                        $(elementRefresh.loading).addClass('ativo');
                    }
                }else{
                    $(elementRefresh.loading).addClass('ativo');
                }
            });
        }else{
            showAlert('Carregando dados...');
        }
        
        atualizarElemento(elementRefresh.element,elementRefresh.url+'&'+$(this).attr('name')+'='+serializaCampo(this)+serializaRepassacampo(this)+' '+elementRefresh.element,function(){
                
                if(elementRefresh.loading && $(elementRefresh.loading).length){
                    
                    $.each($(elementRefresh.loading),function(i,campo){
                        $(campo).removeClass('ativo');
                        $(campo).find('.createAsLoading').remove();
                    });
                }else{
                    hideAlert();
                }
                setTimeout(function(){
                    if(typeof grecaptcha =='object' && $(FROM).find('.g-recaptcha').eq(0).length){
                        try {
                            grecaptcha.render( $(FROM).find('.g-recaptcha').eq(0)[0], {
                                'sitekey' :  $(FROM).find('.g-recaptcha').eq(0).attr('data-sitekey'),
                                'theme':'light'
                             });
                         }catch (e) {
                            grecaptcha.reset();
                        }

                    }else{
                        resetReCAPTCHAv3();
                    }
                },1000);
        });
    }
});

$("body").delegate("a[elementRefresh]",clickEvent,function(evt){
    var elementRefresh = null;
    eval('elementRefresh = '+$(this).attr('elementRefresh'));
    $(this).addClass('active');
    $.each($(this).parent().parent().find('a'),function(){
        $(this).removeClass('active');
    });
    atualizarElemento(elementRefresh.element,$(this).attr('href')+' '+elementRefresh.element,function(){
            setTimeout(function(){
                if(typeof grecaptcha =='object' && $('body').find('.g-recaptcha').eq(0).length){
                    try {
                        grecaptcha.render($('body').find('.g-recaptcha').eq(0)[0], {
                            'sitekey' : $('body').find('.g-recaptcha').eq(0).attr('data-sitekey'),
                            'theme':'light'
                         });
                     }catch (e) {
                        grecaptcha.reset();
                    }

                }else{
                    resetReCAPTCHAv3();
                }
            },2000);
    });
    evt.stopPropagation();
    return false;
});

function countDown(obj){
    if($(obj).find('span.tempo').length==0){
        $(obj).append('<span class="tempo"></span>');
    }
    var start = $(obj).attr('start');
    var tempo = start;
    if($(obj).attr('tempo')!==undefined){
        tempo = $(obj).attr('tempo');
    }
    var str = '';
    tempo = tempo-1;
    $(obj).attr('tempo',tempo);
    if(tempo>0){
        str = tempo+' segundo'+(tempo>1 ? 's' : '');
        setTimeout(function(){countDown(obj);},1000);
        $(obj).find('.tempo').html(str);
    }
    if(tempo==0 && $(obj).attr('callback')!==undefined){
        $(obj).find('.tempo').html('Carregando...');
        eval($(obj).attr('callback'));
    }
}

$.each($(".countdown"),function(i,obj){
    countDown(obj);
});
$("body").delegate('.activeonclick','click', function(evt){  
    if($(this).attr('active')=='next'){      if($(this).next().hasClass('hide')){$(this).next().removeClass('hide'); $(this).next().addClass('show'); $(this).next().focus();}
        if($(this).next().attr('readonly')!==undefined){$(this).next().removeAttr('readonly'); $(this).next().focus();}
        if($(this).next().attr('disabled')!==undefined){$(this).next().removeAttr('disabled'); $(this).next().focus();}
    }else{
        if($(this).attr('active')!==undefined){      
            if($(this).find($(this).attr('active')).hasClass('hide')){$(this).find($(this).attr('active')).removeClass('hide'); $(this).find($(this).attr('active')).addClass('show'); $(this).find($(this).attr('active')).focus();}
            if($(this).find($(this).attr('active')).attr('readonly')!==undefined){$(this).find($(this).attr('active')).removeAttr('readonly'); $(this).find($(this).attr('active')).focus();}
            if($(this).find($(this).attr('active')).attr('disabled')!==undefined){$(this).find($(this).attr('active')).removeAttr('disabled'); $(this).find($(this).attr('active')).focus();}
        }else{
            if($(this).hasClass('hide')){$(this).removeClass('hide'); $(this).addClass('show'); $(this).focus();}
            if($(this).attr('readonly')!==undefined){$(this).removeAttr('readonly'); $(this).focus();}
            if($(this).attr('disabled')!==undefined){$(this).removeAttr('disabled'); $(this).focus();}
        }
    }
});
function validarForm(form){
    var msg = '';
    var arrayErros = new Array;
    var validacoes = {}
    var fields = $(form).find('input:text, input:password, input:file, select, textarea');
    $.each(fields, function(key2,campo){
        var nome_campo = $(campo).attr('name').replace('[','').replace(']','');
        var cond=true;
        if($.isNaUNE($(campo).attr('cond'))){
            cond = eval($(campo).attr('cond'));
        }
        if($.isNaUNE($(campo).attr('required')) && cond){
            if(($(campo).prop('type')!='file' && $(campo).val()=='') || ($(campo).prop('type')=='file' && campo.files && campo.files.length<=0)){
                if(!$.isNaUNE(validacoes[nome_campo])){
                    validacoes[nome_campo] = new Array;
                    arrayErros.push(nome_campo);
                }
                validacoes[nome_campo].push('Deve ser preenchido');
            }else{
                $(campo).removeClass('erro');
            }
        }
        if($.isNaUNE($(campo).prop('type')=='file') && campo.files && campo.files.length){
            var accepttypes = [];
            if($(campo).attr('accept')){
                accepttypes = $(campo).attr('accept').replace(' ','').split(',');
            }
            $.each(campo.files, function(key, val) {
                if(accepttypes.length>0){
                    var valido = false;
                    var extencao = val.name.split('.');
                    extencao = '.'+extencao[extencao.length-1];
                    $.each(accepttypes,function(i,o){
                        if(o.toUpperCase()==extencao.toUpperCase()){
                            valido=true;
                        }
                    });
                    if(!valido){
                        if(!$.isNaUNE(validacoes[nome_campo])){
                            validacoes[nome_campo] = new Array;
                            arrayErros.push(nome_campo);
                        }
                        validacoes[nome_campo].push('Deve ser de um dos tipos validos ('+$(campo).attr('accept')+')');
                    }
                }
                if($.isNaUNE($(campo).attr('maxsize'))){
                    if(val.size>(parseInt($(campo).attr('maxsize'))*1000)){
                        valido=false;
                        
                        if(!$.isNaUNE(validacoes[nome_campo])){
                            validacoes[nome_campo] = new Array;
                            arrayErros.push(nome_campo);
                        }
                        validacoes[nome_campo].push('Deve ser menor que '+($(campo).attr('maxsize')/1000)+'Mb e ele tem '+Math.trunc(val.size/1000000)+'Mb');
                    }
                }
                if(valido){
                    $(campo).removeClass('erro');
                }
            });
        }
    });
    var msg = '';
     $.each(arrayErros, function(i,key2){
        $.each(validacoes[key2], function(key3,value3){
             if($(form).find("[name='"+key2+"']").length){
                 var campo = $(form).find("[name='"+key2+"']");
             }else{
                 if($(form).find("[name='"+key2+"[]']").length){
                    var campo = $(form).find("[name='"+key2+"[]']");
                }else{
                    var campo = $(form).find("[id='"+key2+"']");
                }
             }
             var name_campo = ($.isNaUNE($(campo).attr('title')) ? $(campo).attr('title') : (key2.charAt(0).toUpperCase() + key2.slice(1)));
             msg = msg+'<br/>- '+name_campo+': '+ value3;

             if($(campo).length){
                 $(campo).addClass('erro');
             }

        });
     });

    if(msg!=''){
        showAlert('Foi encontrado erros no formulário:<br/>'+msg,'hideAlert(); return false');
        return false;
    }else{
        return true;
    }
}


  
$("body").delegate("input.sendFile",'change',function(evt){
      
    var THIS=this;
    var id = $(THIS).attr('id');
    var fileInput = document.getElementById(id);   
    var campo = 'documento';
    var arrId = id.split("_");
    var files = fileInput.files;
    var form = $(THIS).parents('form').eq(0).serializeObject(); 
    var milliseconds = new Date().getTime();
    var divDinamica = $(THIS).parent();    
   var progressBarContainer = $(divDinamica).find('.progress').eq(0);
   var progressBar = progressBarContainer.find('.progress-bar.progress-bar-striped');
   $(THIS).parents('.bloco').eq(0).removeClass('erro');
  

   function uploadFile(index) {

        if (index < files.length) {
            var formData = new FormData();
            formData.append(campo, files[index]);
            formData.append('json',JSON.stringify({
                jsonrpc:2.0,
                method:form.modulo+'/checkFileTemp',
                id: milliseconds
               }));
         
            $.ajax({
                url: './painel/',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener('progress', function(event) {
                        if (event.lengthComputable) {
                            var percentComplete = (event.loaded / event.total) * 100;
                           progressBarContainer.addClass('active');
                           progressBar.css('width',  percentComplete.toFixed(2) + '%');
                        }
                    }, false);
                    return xhr;
                },
                success: function(json) {

                    if(typeof json.result === 'object'){
                        var jsonResp = json.result; 
                       
                     }else{
                        var jsonResp = json; 
                     }	
                     
                        progressBarContainer.removeClass('active');
                        divDinamica.removeClass('erro');
                         
                        var newDiv = $('<div class="filedata"></div>');
                        var errormsg = '';
                     
                            if(jsonResp.validacoes){
                                var msg = '';
                                $.each(jsonResp.validacoes, function(i,key){
                                    if(typeof(key)=='object'){
                                        $.each(key, function(i2,key2){
                                            msg +=key2; 
                                        });
                                    }else{
                                        msg +=key; 
                                    }
                                });
                                newDiv.addClass('erro');
                                errormsg = '<div class="row"><div class="col-12">'+msg+'</div></div>';
                                newDiv.append('<div class="row py-1"><div class="col-10 col-md-11"><a href="'+URL.createObjectURL(files[index])+'" target="_blank">'+files[index].name+'</a>'+errormsg+'</div><div class="col-2 col-md-1"><a href="#" class="removebt"><i class="fa fa-remove"/></a></div></div>');
                            }else{
                                newDiv.append('<input type="hidden" name="file_'+fileInput.name+'" value="'+jsonResp.tmpName+'"/>');
                                
                                var img = '';
                                var ext = files[index].name.split('.');
                                ext = ext[ext.length-1];
                                if(ext=='jpg' || ext=='jpeg' || ext=='png' || ext=='bmp' || ext=='gif'){
                                    newDiv.append('<div class="row py-1"><div class="col-2 col-md-1"><a href="'+URL.createObjectURL(files[index])+'" class="thumb" style="background-image: url(\''+URL.createObjectURL(files[index])+'\')" target="_blank"></a></div><div class="col-8 col-md-10"><a href="'+URL.createObjectURL(files[index])+'" target="_blank">'+files[index].name+'</a>'+errormsg+'</div><div class="col-2 col-md-1"><a href="#" class="removebt"><i class="fa fa-remove"/></a></div></div>');
                                }else{
                                    newDiv.append('<div class="row py-1"><div class="col-2 col-md-1"><a href="'+URL.createObjectURL(files[index])+'" class="thumb" target="_blank"></a></div><div class="col-8 col-md-10"><a href="'+URL.createObjectURL(files[index])+'" target="_blank">'+files[index].name+'</a>'+errormsg+'</div><div class="col-2 col-md-1"><a href="#" class="removebt"><i class="fa fa-remove"/></a></div></div>');
                                }
                            }

                            newDiv.delegate('a.removebt','click', function(evt){  
                                $(this).parents('.filedata').eq(0).remove();
                                $(fileInput).show();
                                return false;
                            });
                        if($(fileInput).prop('multiple')!==true){
                            $(fileInput).hide();
                            divDinamica.find('.filedata').remove();
                        }
                        divDinamica.append(newDiv);
                        uploadFile(index + 1);
                },
                error: function(xhr, status, error) {
                    progressBarContainer.removeClass('active');
                    divDinamica.classList.add('erro');
                    divDinamica.append('Erro ao enviar arquivo: ' + files[index].name);
                    //  o próximo arquivo
                    uploadFile(index + 1);
                }
            });
        }else{
            $(fileInput).val('');
        }
    }

   
    uploadFile(0);
});

$("body").delegate('form.uploadArquivo','submit', function(evt){
    showAlert('Aguarde alguns instantes...');
    var THIS=this;
    var milliseconds = new Date().getTime();
    var form = $(this).serializeObject(); 
    $.each(form,function(i,o){
        if(i.indexOf('[]')!=-1){
            if(form[i.replace('[]','')]===undefined){
            form[i.replace('[]','')] = new Array;
            }
            form[i.replace('[]','')].push(o);
            delete form[i];
        }
    });
    
    var online = navigator.onLine; // true ou false, (há, não há conexão à internet)
    
    if(validarForm(THIS)){
        var processData = true;
        var contentType = "application/x-www-form-urlencoded";
        if ($(THIS).attr('enctype') == 'multipart/form-data') {
            var formData = new FormData();
            processData = false;
            contentType = false;
            $(THIS).find('input[type=file]').each(function(i,o){
                var file = [];
                $.each(o.files, function(key, file) {
                    formData.append(o.name,file);
                });
                if(file.length==1){
                    file = file[file.length-1];
                    formData.append(o.name,file);
                }
            });
            formData.append('json',JSON.stringify({
                jsonrpc:2.0,
                method:form.modulo+'/'+form.acao,
                params:form,
                id: milliseconds
               }));
            formData.append('callback','?');
        }else{
            var formData = {'json':JSON.stringify({
                jsonrpc:2.0,
                method:form.modulo+'/'+form.acao,
                params:form,
                id: milliseconds
               }),'callback':'?'}
        }

        if(online){
            $.ajax({
             type: 'POST',
             url: this.action,
             async: true,
             cache: false,
             processData: processData,
             contentType: contentType,
             dataType: "json",
             data:formData,
            success: function(json){ 
                        if(typeof json.result === 'object'){
                           var jsonResp = json.result; 
                        }else{
                           var jsonResp = json; 				   
                        }	

                        hideAlert();

                        var resultado=jsonResp.nr;
                        $(THIS).find('input,select,textarea').removeClass('erro');
                        if(jsonResp.msg ==undefined && jsonResp.custom_msg !==undefined){
                            jsonResp.msg = jsonResp.custom_msg;
                        }
                        if(jsonResp.validacoes!=undefined && jsonResp.validacoes!=''){
                                if(jsonResp.msg ==undefined){
                                    jsonResp.msg = '<strong>Não foi possível salvar os dados</strong><br/>Confira no formulário os campos marcados em vermelho';
                                }
                                var erros=false;
                                $.each(jsonResp, function(key, value) { 
                                        var KEY=key;
                                        var VALOR=value;

                                        if(KEY=='validacoes' && VALOR!=0){
                                                jsonResp.msg = (jsonResp.msg ? jsonResp.msg : 'Foi encontrado erros no formulário:');
                                                $.each(VALOR, function(key2,value2){
                                                   $.each(value2, function(key3,value3){
                                                                erros = true;
                                                                if($(THIS).find("[name='"+key2+"']").length){
                                                                    var campo = $(THIS).find("[name='"+key2+"']");
                                                                }else{
                                                                    var campo = $(THIS).find("[id='"+key2+"']");
                                                                }
                                                                var name_campo = ($.isNaUNE($(campo).attr('title')) ? $(campo).attr('title') : (key2.charAt(0).toUpperCase() + key2.slice(1)));
                                                                jsonResp.msg = jsonResp.msg+'<br/>- '+name_campo+': '+ value3;
        //									$(THIS).find("[name='"+key2+"']").parent('div').before('<span class="erro">'+value3+'</span>');
                                                                
                                                                if($(campo).length){
                                                                    $(campo).addClass('erro');
                                                                }

                                                   });
                                                });
                                        }

                                });
                                if(erros && jsonResp.msg!=undefined){
                                    jsonResp.msg = '<br/>'+jsonResp.msg;
                                }
                        }else{
                            if(jsonResp.msg==undefined){
                                if(jsonResp.nr>0){
                                    jsonResp.msg = 'Operação efetuada com sucesso!';
                                }else{
                                    jsonResp.msg = 'Nenhum registro foi salvo ou atualizado!';
                                }
                            }
                        }
                        jsonResp.msg = '<span class="overflow">'+jsonResp.msg+'</span>';
                        if(jsonResp.clearForm!=undefined && jsonResp.clearForm=='1'){
                                $(THIS).find('input:text, input:password, input:file, select, textarea').val('');
                                $(THIS).find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
                        }

                        if(jsonResp.autoredirect!=undefined){
                                location.href=jsonResp.autoredirect;
                        }else{
                            if(jsonResp.redirect!=undefined && jsonResp.msg!=undefined){
                                if(jsonResp.target!=undefined){
                                    showAlert(jsonResp.msg,jsonResp.redirect,undefined,jsonResp.target);
                                }else{
                                    showAlert(jsonResp.msg,jsonResp.redirect);
                                }
                            }else{
                                if(jsonResp.redirect!=undefined && jsonResp.msg==undefined){
                                        location.href=jsonResp.redirect;
                                }
                                if(jsonResp.msg!=undefined && jsonResp.redirect==undefined){
                                        showAlert(jsonResp.msg,'hideAlert(); return false');
                                }

                            }		
                        }

                        // estilos para analise de documentos
                        var docForm = $('#analiseDocumentosForm_'+jsonResp.idcenso_documento);
                        if(jsonResp.nr > 0 && jsonResp.idcenso_documento!=undefined && docForm.length) {
                            if (jsonResp.status != 'PE' && jsonResp.status != 'RE') {
                                if (docForm.parent().hasClass('active')) {
                                    docForm.parent().removeClass('active');
                                }
                                if(docForm.find('[changepossubmit]').length){
                                    docForm.find('[changepossubmit]').each(function(i,obj){
                                        var el = {};
                                        eval('el = '+$(obj).attr('changepossubmit'));
                                        if(el.attr){
                                            $(obj).attr(el.attr.name,el.attr.value);
                                        }
                                        if(el.html){
                                            $(obj).html(el.html);
                                        }
                                        if(el.status){
                                            if (jsonResp.status == 'A') {
                                                docForm.find('button').html('<i class="fa fa-refresh"></i>&nbsp;em análise');
                                            }else{
                                                if (jsonResp.status == 'OK') {
                                                    docForm.find('button').html('<i class="fa fa-check"></i>&nbsp;analisado');
                                                    docForm.find('button').attr('disabled',true);
                                                }else
                                                    if (jsonResp.status == 'PE') {
                                                        docForm.find('button').html('<i class="fa fa-upload"></i>&nbsp;enviar');
                                                    }else{
                                                          if (jsonResp.status == 'RE') {
                                                                docForm.find('button').html('<i class="fa fa-upload"></i>&nbsp;reenviar');
                                                            }else{
                                                                docForm.find('button').html('indefinido');
                                                                docForm.find('button').attr('disabled',true);
                                                            }
                                                    }
                                            }
                                        }
                                    });
                                }else{
                                    if (docForm.find('button').length) {
                                        if (jsonResp.status == 'A') {
                                            docForm.find('button').html('<i class="fa fa-refresh"></i>&nbsp;em análise');
                                        }else{
                                            if (jsonResp.status == 'OK') {
                                                docForm.find('button').html('<i class="fa fa-check"></i>&nbsp;analisado');
                                                docForm.find('button').attr('disabled',true);
                                            }else
                                                if (jsonResp.status == 'PE') {
                                                    docForm.find('button').html('<i class="fa fa-upload"></i>&nbsp;enviar');
                                                }else{
                                                      if (jsonResp.status == 'RE') {
                                                            docForm.find('button').html('<i class="fa fa-upload"></i>&nbsp;reenviar');
                                                        }else{
                                                            docForm.find('button').html('indefinido');
                                                            docForm.find('button').attr('disabled',true);
                                                        }
                                                }
                                        }
                                    }
                                }

                            }

                            $('#analiseDocumentosForm_'+jsonResp.idcenso_documento).load(document.location.href+' '+'#analiseDocumentosForm_'+jsonResp.idcenso_documento);

                        }
                        return false;

                }, handleError: function( s, xhr, status, e ) {

                        hideAlert();
                        showAlert('Erro ao tentar fazer a requisição.','hideAlert(); return false');			
                        return false;

                }
            });
        }else{
            alert('Você parece estar sem conexão');
            location.reload();
        }
    }
    evt.preventDefault();
    return false;
});

$("body").delegate('form.sistema_multi','submit', function(evt){
		showAlert('Aguarde alguns instantes...');

                
		var THIS=this;
                var milliseconds = new Date().getTime();
                var form = $(this).serializeObject();
                
                var processData = true;
                var contentType = "application/x-www-form-urlencoded";
                if ($(THIS).attr('enctype') == 'multipart/form-data') {
                    var formData = new FormData();
                    processData = false;
                    contentType = false;
                    $(THIS).find('input[type=file]').each(function(i,o){
                        var file = [];
                        $.each(o.files, function(key, file) {
                            formData.append(o.name,file);
                        });
                        if(file.length==1){
                            file = file[file.length-1];
                            formData.append(o.name,file);
                        }
                    });
                    formData.append('json',JSON.stringify({
                        jsonrpc:2.0,
                        method:form.modulo+'/'+form.acao,
                        params:form,
                        id: milliseconds
                       }));
                    formData.append('callback','?');
                }else{
                    formData = {'json':JSON.stringify({
                        jsonrpc:2.0,
                        method:form.modulo+'/'+form.acao,
                        params:form,
                        id: milliseconds
                       }),'callback':'?'}
                }
        
                   $.ajax({
                    type: 'POST',
                    url: this.action,
                    async: true,
                    cache: false,
                    processData: processData,
                    contentType: contentType,
                    dataType: "json",
                    data:formData,
                    success: function(json){ 
				if(typeof json.result === 'object'){
				   var jsonResp = json.result; 
				}else{
				   var jsonResp = json; 				   
				}	
				
				hideAlert();
                                if(typeof json.error === 'object' && json.error.data){
                                    jsonResp = json.error.data;
                                }
				var resultado=jsonResp.nr;
                                if(jsonResp.msg==undefined && jsonResp.custom_msg!=undefined){
                                    jsonResp.msg = jsonResp.custom_msg;
                                }
                                $(THIS).find('input,select,textarea').removeClass('is-invalid');
				if(jsonResp.validacoes!=undefined && jsonResp.validacoes!=''){
                                        if(jsonResp.msg ==undefined){
                                            jsonResp.msg = 'Não foi possível salvar os dados<br/>Confira no formulário os campos marcados em vermelho';
                                        }
                                        var erros=false;
					$.each(jsonResp, function(key, value) { 
						var KEY=key;
						var VALOR=value;

						if(KEY=='validacoes' && VALOR!=0){
                                                        jsonResp.msg = (jsonResp.msg ? jsonResp.msg : 'Foi encontrado erros no formulário:');
							$.each(VALOR, function(key2,value2){
							   $.each(value2, function(key3,value3){
                                                                        erros = true;
									jsonResp.msg = jsonResp.msg+'<br/>- '+key2.charAt(0).toUpperCase()+key2.slice(1)+': '+ value3;
//									$(THIS).find("[name='"+key2+"']").parent('div').before('<span class="erro">'+value3+'</span>');
									$(THIS).find("[name='"+key2+"']").addClass('is-invalid');
                                                                        
							   });
							});
						}

					});
                                        if(erros && jsonResp.msg!=undefined){
                                            jsonResp.msg = '<br/>'+jsonResp.msg;
                                        }
                                        if(jsonResp.fail_callback!=undefined){
                                            eval(jsonResp.fail_callback);
                                        }
				}else{
                                    if(jsonResp.msg==undefined){
                                        if(jsonResp.nr>0){
                                            jsonResp.clearForm = true;
                                            jsonResp.msg = 'Operação efetuada com sucesso!';
                                        }else{
                                            jsonResp.msg = 'Nenhum registro foi salvo ou atualizado!';
                                        }
                                    }
                                }
                                jsonResp.msg = '<span class="overflow">'+jsonResp.msg+'</span>';
				if(jsonResp.clearForm!=undefined && jsonResp.clearForm=='1'){
					$(THIS).find('input:text, input:password, input:file, select, textarea').val('');
					$(THIS).find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
				}
                                if(jsonResp.autoredirect!=undefined){
                                        location.href=jsonResp.autoredirect;
                                }else{
                                    if(jsonResp.redirect!=undefined && jsonResp.msg!=undefined){
                                        if(jsonResp.target!=undefined){
                                            showAlert(jsonResp.msg,jsonResp.redirect,undefined,jsonResp.target);
                                        }else{
                                            showAlert(jsonResp.msg,jsonResp.redirect);
                                        }
                                    }else{
                                        if(jsonResp.redirect!=undefined && jsonResp.msg==undefined){
                                                location.href=jsonResp.redirect;
                                        }
                                        if(jsonResp.msg!=undefined && jsonResp.redirect==undefined){
                                                showAlert(jsonResp.msg,'hideAlert(); return false');
                                        }

                                    }		
                                }
                                if(jsonResp.nr>0){
                                    if(jsonResp.sucess_callback!=undefined){
                                        eval(jsonResp.sucess_callback);
                                    } 
                                }else{
                                    if(jsonResp.fail_callback!=undefined){
                                        eval(jsonResp.fail_callback);
                                    }
                                }
				return false;
	
			}, error: function( s, xhr, status, e ) {
				hideAlert();
				showAlert('Erro ao tentar fazer a requisição.','hideAlert(); return false');			
				return false;
	
			}
			
			
	
		});
            evt.preventDefault();
            return false;
		
	});
        
        
$("body").delegate('form.sistema','submit', function(evt){  
	
		var THIS=this;
                var valido=true;
                if(typeof grecaptcha =='object' && $(THIS).find('.g-recaptcha').eq(0).length){
                    if(grecaptcha.getResponse()){
                        valido=true;
                    }else{
                        valido=false;
                        alert('Por favor clique na caixa para confirmação de que não é um robô!');
                    }
                }
                if(valido){
                    showAlert('Aguarde alguns instantes...');
                    var milliseconds = new Date().getTime();
                    var form = $(this).serializeObject();           
                       $.ajax({
                        type: 'POST',
                        url: this.action,
                        async: true,
                        cache: false,
                        dataType: "json",
                        data:{json:JSON.stringify({jsonrpc:2.0,
                                method:form.modulo+'/'+form.acao,
                                params:form,
                                id: milliseconds
                               }),callback:'?'},
                        success: function(json){ 
                                    if(typeof json.result === 'object'){
                                       var jsonResp = json.result; 
                                    }else{
                                       var jsonResp = json; 				   
                                    }	

                                    hideAlert();

                                    var resultado=jsonResp.nr;
                                    $(THIS).find('input,select,textarea').removeClass('is-invalid');
                                    if((jsonResp.msg ==undefined || jsonResp.msg =='') && (jsonResp.custom_msg !==undefined && jsonResp.custom_msg !='')){
                                        jsonResp.msg = jsonResp.custom_msg;
                                    }
                                    if(jsonResp.validacoes!=undefined && jsonResp.validacoes!=''){
                                            if(jsonResp.msg ==undefined){
                                                jsonResp.msg = 'Não foi possível salvar os dados<br/>Confira no formulário os campos marcados em vermelho';
                                            }
                                            var erros=false;
                                            $.each(jsonResp, function(key, value) { 
                                                    var KEY=key;
                                                    var VALOR=value;

                                                    if(KEY=='validacoes' && VALOR!=0){
                                                            jsonResp.msg = (jsonResp.msg ? jsonResp.msg : 'Foi encontrado erros no formulário:');
                                                            $.each(VALOR, function(key2,value2){
                                                               $.each(value2, function(key3,value3){
                                                                            erros = true;
                                                                            var name_campo = (key2.charAt(0).toUpperCase() + key2.slice(1));
                                                                            jsonResp.msg = jsonResp.msg+'<br/>- '+name_campo+': '+ value3;
    //									$(THIS).find("[name='"+key2+"']").parent('div').before('<span class="erro">'+value3+'</span>');
                                                                            $(THIS).find("[name='"+key2+"']").addClass('is-invalid');

                                                               });
                                                            });
                                                    }

                                            });
                                            if(erros && jsonResp.msg!=undefined && jsonResp.msg!=''){
                                                jsonResp.msg = '<br/>'+jsonResp.msg;
                                            }
                                    }else{
                                        if(jsonResp.msg==undefined && jsonResp.msg!=''){
                                            if(jsonResp.nr>0){
                                                jsonResp.msg = 'Operação efetuada com sucesso!';
                                            }else{
                                                jsonResp.msg = 'Nenhum registro foi salvo ou atualizado!';
                                            }
                                        }
                                    }
                                    jsonResp.msg = '<span class="overflow">'+jsonResp.msg+'</span>';
                                    if(jsonResp.clearForm!=undefined && jsonResp.clearForm=='1'){
                                            $(THIS).find('input:text, input:password, input:file, select, textarea').val('');
                                            $(THIS).find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
                                    }

                                    if(jsonResp.autoredirect!=undefined){
                                            location.href=jsonResp.autoredirect;
                                    }else{
                                        if(jsonResp.redirect!=undefined && jsonResp.msg!=undefined){
                                            if(jsonResp.target!=undefined){
                                                showAlert(jsonResp.msg,jsonResp.redirect,undefined,jsonResp.target);
                                            }else{
                                                showAlert(jsonResp.msg,jsonResp.redirect);
                                            }
                                        }else{
                                            if(jsonResp.redirect!=undefined && jsonResp.msg==undefined){
                                                    location.href=jsonResp.redirect;
                                            }
                                            if(jsonResp.msg!=undefined && jsonResp.redirect==undefined){
                                                    showAlert(jsonResp.msg,'hideAlert(); return false');
                                            }

                                        }		
                                    }
                                    return false;

                            }, error: function( s, xhr, status, e ) {
                                    hideAlert();	
                                    if(typeof grecaptcha =='object' && $(THIS).find('.g-recaptcha').eq(0).length){
                                        grecaptcha.reset();
                                    }else{
                                        resetReCAPTCHAv3();
                                    }
                                    showAlert('Erro ao tentar fazer a requisição.','hideAlert(); return false');
                                    return false;

                            }, complete : function(){
                                if(typeof grecaptcha =='object' && $(THIS).find('.g-recaptcha').eq(0).length){
                                    grecaptcha.reset();
                                }else{
                                    resetReCAPTCHAv3();
                                }
                                return false;
                            }
                        });
                    }
            evt.preventDefault();
            return false;
		
	});
        
        function nextField(OBJ,janela,index,EVENT){
            if(OBJ==null && $.isNaUNE(index)){
                $(janela).find('form').eq(0).find('input,select,textarea').eq( index + 1 ).focus();
                return true;
            }else{
                    if($.isNaUNE(OBJ)){
                        if(!$(OBJ).is('textarea')){
                            var form = $(OBJ).parents('form');
                            var $input = $(OBJ).parents('form').eq(0).find('input,select,textarea,a.button').not('[type=hidden],[readonly],[disabled],[type=file],[type=image]');
                            if(!$(OBJ).is( $input.last() ) ){
                                if(EVENT && EVENT!=undefined){
                                    EVENT.stopImmediatePropagation();
                                    EVENT.preventDefault();
                                }
                               var latIndex = $input.index(OBJ);
                               var frame = false;
                               if($input.eq( latIndex).parents('form').eq(0).find('.frame').length>1){
                                    frame = $input.eq( latIndex).parents('.frame').eq(0).eq(0);
                               }
                                $input.each(function(){
                                    if($input.eq(latIndex + 1).prop('type')=='hidden' || $input.eq(latIndex + 1).attr('readonly')=='readonly'){
                                        latIndex+=1;
                                    }else{
                                         return latIndex;
                                    }
                                });
                                if(frame && $(frame).css('display')!=$input.eq( latIndex + 1).parents('.frame').eq(0).css('display')){
                                    var novoFlag = $(frame).css('display');
                                    $(frame).css('display','none');
                                    $input.eq( latIndex + 1).parents('.frame').eq(0).css('display',novoFlag);
                                    var idnovo = $input.eq( latIndex + 1).parents('.frame').eq(0).attr('id');
                                    $('.page-control > ul li').find('a[href=#'+idnovo+']').trigger("click");
                                }
                                if($input.eq( latIndex + 1 ).length){
                                    if($input.eq( latIndex + 2 ).length==0 && $input.eq( latIndex + 1 ).is('input[type=submit],input[type=button],a')){
                                       $input.eq( latIndex + 1 ).trigger("click");
                                        return true;
                                    }else{
                                        $input.eq( latIndex + 1 ).focus();
                                    }
                                }else{
                                    if($input.eq($input.index(OBJ)).hasClass('refreshJanela') || $input.eq($input.index(OBJ)).hasClass('refreshPorConsulta')){
                                        $input.eq($input.index(OBJ)).blur();
                                    }
                                }
                                return false;
                            }else{
                                if($input.eq($input.index(OBJ)).hasClass('refreshJanela_') || $input.eq($input.index(OBJ)).hasClass('refreshPorConsulta_')){
                                    refreshPorConsulta(OBJ);
                                    return false
                                }else{
                                    $input.eq($input.index(OBJ)).blur();
                                    if($input.eq($input.index(OBJ)).is('input[type=submit],input[type=button],a')){
                                       $input.eq($input.index(OBJ)).trigger("click");
                                    }
                                    return true;
                                }
                            }
                        }
                    }
            }
        }
		
		
        
	  $('body').delegate('input.pis_pasep','keyup',function(e){
                var res = txtBoxFormat($(this).attr('id'), '999.999.999-99', e);
                if($(this).val().length==$(this).attr('maxlength')){
                   nextField(this,null,null,e);
                }
                return res;
	  });
	  $('body').delegate('input.matricula_rg_cpf','keyup',function(e){
				if($(this).val().length<=7){
					var res =  txtBoxFormat($(this).attr('id'), '99999-9', e);
			    }else{
					if($(this).val().length<14){
						var res =  txtBoxFormat($(this).attr('id'), '999999999999', e);
					}else{
						  var res =  txtBoxFormat($(this).attr('id'), '999.999.999-99', e);
					}
			    }
                if($(this).val().length==$(this).attr('maxlength')){
                   nextField(this,null,null,e);
                }
                return res;
	  });
	  
 
		$('body').delegate('input[type="text"], textarea, input[type="tel"]','keyup', function(e) {
			var start = this.selectionStart;
			var end = this.selectionEnd;
			$(this).val(function(_, val) {
				return val.toLocaleUpperCase('pt-BR');
			});
			this.setSelectionRange(start, end);
		});
          
      $('body').delegate('input.cpf_cnpj','keyup',function(e){
            var camposemchars = ($(this).val()).replaceAll('(','').replaceAll(')','').replaceAll('-','').replaceAll(' ','').replaceAll('.','').replaceAll('/','');
            if (camposemchars.length<=11) {
                var res = txtBoxFormat($(this).attr('id'), '999.999.999-99', e);
                if($(this).val().length==$(this).attr('maxlength')){
                    nextField(this,null,null,e);
                }
                return res;
            }else{
                var res =  txtBoxFormat($(this).attr('id'), '99.999.999/9999-99', e);
                if($(this).val().length==$(this).attr('maxlength')){
                nextField(this,null,null,e);
                }
                return res;
            }
        });
        

      $('body').delegate('input.cpf','keyup',function(e){
		  var res = txtBoxFormat($(this).attr('id'), '999.999.999-99', e);
                if($(this).val().length==$(this).attr('maxlength')){
                   nextField(this,null,null,e);
                }
                return res;
	  });
	  $('body').delegate('input.cnpj','keyup',function(e){
		   var res =  txtBoxFormat($(this).attr('id'), '99.999.999/9999-99', e);
                if($(this).val().length==$(this).attr('maxlength')){
                   nextField(this,null,null,e);
                }
                return res;
	  });
	  $('body').delegate('input.mesano','keyup',function(e){
		   var res =  txtBoxFormat($(this).attr('id'), '99/9999', e);
                if($(this).val().length==$(this).attr('maxlength')){
                   nextField(this,null,null,e);
                }
                return res;
	  });
	  $('body').delegate('input.tempo','keyup',function(e){
		   var res =  txtBoxFormat($(this).attr('id'), '99:99', e);
                if($(this).val().length==$(this).attr('maxlength')){
                   nextField(this,null,null,e);
                }
                return res;
	  });
	  $('body').delegate('input.date','keyup',function(e){
		   var res =  txtBoxFormat($(this).attr('id'), '99/99/9999', e);
                if($(this).val().length==$(this).attr('maxlength')){
                   nextField(this,null,null,e);
                }
                return res;
	  });
	  $('body').delegate('input.date48notw','keyup',function(e){
		   var res =  txtBoxFormat($(this).attr('id'), '99/99/9999', e);
                if($(this).val().length==$(this).attr('maxlength')){
                   nextField(this,null,null,e);
                }
                return res;
	  });
            
	  $('body').delegate('input.datetime','keyup',function(e){
		   var res =  txtBoxFormat($(this).attr('id'), '99/99/9999 99:99:99', e);
                    if($(this).val().length==$(this).attr('maxlength')){
                       nextField(this,null,null,e);
                    }
                    return res;
	  });
          
	  $('body').delegate('input.cep','keyup',function(e){
		var res =  txtBoxFormat($(this).attr('id'), '99999-999', e);
		 if($(this).val().length==9){
			 webServiceCep($(this));
		 }
		 
		if($(this).val().length==$(this).attr('maxlength')){
		   nextField(this,null,null,e);
		}
		return res;
	  });
           $('body').delegate('input.inteiro','keyup',function(e){
                var maxlength = $(this).attr('maxlength');
                if(maxlength!==undefined){
                    var mask = '';
                    for(var i=0;i<=parseInt(maxlength);i++){
                        mask+='9';
                    }
                }else{
                    mask='999999999';
                }
		var res =  txtBoxFormat($(this).attr('id'), mask, e);
                if($(this).val().length==$(this).attr('maxlength')){
                   nextField(this,null,null,e);
                }
                return res;
	  });
	  $('body').delegate('input.moeda','keyup',function(e){
		  var res = MascaraMoeda($(this)[0], '','.', e);
                if($(this).val().length==$(this).attr('maxlength')){
                   nextField(this,null,null,e);
                }
                return res;
	  });
	  $('body').delegate('input.preco','focus',function(e){
		  $(this).maskMoney({prefix:'', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
	  });
          
          
          
	  $('body').delegate('input.fone','keyup',function(e){
		  if($(this).val().length<=14){
		  	var res =  txtBoxFormat($(this).attr('id'), '(99) 9999-9999', e);
		  }else{
			  var res =  txtBoxFormat($(this).attr('id'), '(99) 99999-9999', e);
		  }
                if($(this).val().length==$(this).attr('maxlength')){
                   nextField(this,null,null,e);
                }
                return res;
	  });
          
	  $('body').delegate('input.telefone','keyup',function(e){
		  if($(this).val().length<=14){
		  	var res =  txtBoxFormat($(this).attr('id'), '(99) 9999-9999', e);
		  }else{
			  var res =  txtBoxFormat($(this).attr('id'), '(99) 99999-9999', e);
		  }
                if($(this).val().length==$(this).attr('maxlength')){
                   nextField(this,null,null,e);
                }
                return res;
	  });
        datepicker();

    $.fn.serializeObject = function() {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };
    
    
    $.each($('.map'),function(){
        if($(this).attr('target')=='_system'){
            if((navigator.platform.indexOf("iPhone") != -1) || (navigator.platform.indexOf("iPad") != -1) || (navigator.platform.indexOf("iPod") != -1)){
                $(this).attr('href',"maps://"+$(this).attr('lat')+","+$(this).attr('long')+"?q="+$(this).attr('end'));
            }else{
                $(this).attr('href',"geo://"+$(this).attr('lat')+","+$(this).attr('long')+"?q="+$(this).attr('end'));
            }
        }
    });
})(jQuery); // End of use strict



var buscandoCEP = false;

	function webServiceCep(obj){
            var cep = (($(obj).val()).replace('-','')).replace('_','');
            var prefix = '';
            if(cep && $(obj).attr('buscando')!='true'){
                if($(obj).attr('name').indexOf('_')>0){
                    prefix = $(obj).attr('name').substr(0,$(obj).attr('name').indexOf('_')+1);
                }
                var acao = $(obj).parents('form').eq(0).find('input[name="acao"]');

                if($(obj).attr('buscando')!='true'){


                    $(obj).attr('buscando','true');
                    if($(acao).length==1 && $(acao).val()=='update'){  
                        if(!confirm('Você deseja consultar este cep e auto-preencher os campos?')){
                            $(obj).attr('buscando','false');
                            return false;
                        }
                    }


                    var endereco = $(obj).parents('.wrapper').eq(0).find('input.endereco');
                    var rua = $(obj).parents('.wrapper').eq(0).find('input.rua');
                    var logradouro = $(obj).parents('.wrapper').eq(0).find('input.logradouro');
                    var bairro = $(obj).parents('.wrapper').eq(0).find('input.bairro');
                    var num = $(obj).parents('.wrapper').eq(0).find('input.num');
                    var numero = $(obj).parents('.wrapper').eq(0).find('input.numero');
                    var cidade_sel = $(obj).parents('.wrapper').eq(0).find('select.cidade');
                    var cidade = $(obj).parents('.wrapper').eq(0).find('input.cidade');
                    var estado = $(obj).parents('.wrapper').eq(0).find('input.estado');
                    var uf = $(obj).parents('.wrapper').eq(0).find('input.uf');
                    var uf_sel = $(obj).parents('.wrapper').eq(0).find('select.uf');

                    /*
                    var endereco = $(obj).parents('form').eq(0).find('input[name="'+prefix+'endereco"]');
                    var rua = $(obj).parents('form').eq(0).find('input[name="'+prefix+'rua"]');
                    var logradouro = $(obj).parents('form').eq(0).find('input[name="'+prefix+'logradouro"]');
                    
                    var bairro = $(obj).parents('form').eq(0).find('input[name="'+prefix+'bairro"]');

                    var num = $(obj).parents('form').eq(0).find('input[name="'+prefix+'num"]');
                    var numero = $(obj).parents('form').eq(0).find('input[name="'+prefix+'numero"]');

                    var cidade_sel = $(obj).parents('form').eq(0).find('select[name="'+prefix+'cidade"]');
                    var cidade = $(obj).parents('form').eq(0).find('input[name="'+prefix+'cidade"]');

                    var estado = $(obj).parents('form').eq(0).find('input[name="'+prefix+'estado"]');
                    var uf = $(obj).parents('form').eq(0).find('input[name="'+prefix+'uf"]');
                    var uf_sel = $(obj).parents('form').eq(0).find('select[name="'+prefix+'uf"]');

                */
//                    mostrarAviso("Buscando informações...");
                     $.ajax({
                      url: './painel/plugins/AjaxgetCep.php?cep='+($(obj).val()).replace('-',''),
                      dataType: "json"
                    }).done(function(data) {
                        if(!data.error){
                            if($(bairro).length==1){ $(bairro).eq(0).val(data.result.bairro.toLocaleUpperCase('pt-BR'));}
                            if($(estado).length==1){
                                    $(estado).eq(0).val(data.result.uf);
                            }else{
                                if($(uf).length==1){
                                    $(uf).eq(0).val(data.result.uf);
                                }else{
                                    if($(uf_sel).length==1){
                                        $(uf_sel).find('option').filter(function () { return $(this).html() == (retirarAcento(data.result.uf)).toUpperCase(); }).eq(0).attr('selected', 'selected');
                                        if($(cidade_sel).length==1){
                                            if($(uf_sel).attr('elementRefresh')!='' && $(uf_sel).attr('elementRefresh')!=undefined){
                                                var elementRefresh = null;
                                                eval('elementRefresh = '+$(uf_sel).attr('elementRefresh'));
                                                atualizarElemento(elementRefresh.element,elementRefresh.url+'&'+$(uf_sel).attr('name')+'='+$(uf_sel).val()+' '+elementRefresh.element,function(){
                                                    $('select[name="'+prefix+'cidade"]').find('option').filter(function () { return retirarAcento($(this).html()).toUpperCase() == (retirarAcento(data.result.cidade)).toUpperCase(); }).eq(0).attr('selected', 'selected');
                                                    if($('input[name="'+prefix+'num"]').length==1){
                                                        $('input[name="'+prefix+'num"]').eq(0).focus();
                                                    }else{
                                                        if($('input[name="'+prefix+'numero"]').length==1){
                                                            $('input[name="'+prefix+'numero"]').eq(0).focus();
                                                        }
                                                    }
                                                });
                                            }
                                        }
                                    }
                                }
                            }


                            if($(cidade).length==1){
                                    $(cidade).eq(0).val(data.result.cidade.toLocaleUpperCase('pt-BR'));
                            }

                            if($(rua).length==1){
                                    $(rua).eq(0).val((data.result.tipo+' '+data.result.logradouro).toLocaleUpperCase('pt-BR'));
                            }else{
                                    if($(endereco).length==1){
                                            $(endereco).eq(0).val((data.result.tipo+' '+data.result.logradouro).toLocaleUpperCase('pt-BR'));
                                    }else{
                                        if($(logradouro).length==1){
                                                $(logradouro).eq(0).val((data.result.tipo+' '+data.result.logradouro).toLocaleUpperCase('pt-BR'));
                                        }
                                    }
                            }
                            if($(num).length==1){
                                    $(num).eq(0).focus();
                            }else{
                                    if($(numero).length==1){
                                            $(numero).eq(0).focus();
                                    }
                            }
                    }else{
                            alert('Erro na busca do cep: '+data.error.message);
                    }

                    }).fail(function(jqXHR, textStatus) {
                            alert('Erro na busca do cep: '+textStatus);
                    }).always(function(){
                        $(obj).attr('buscando','false');                   
                    });
                }
            }
 }




function strpos (haystack, needle, offset) {
    
    var i = (haystack + '').indexOf(needle, (offset || 0));
    return i === -1 ? false : i;
  
}




function print_r(arr, text, tab) {

    var text = (text ? text : "Array \n("), tab = (tab ? tab : "\t");

    for (key in arr)
            if (typeof arr[key] == "object")
                    text = print_r(arr[key], text + "\n" + tab + "[" + key + "] => Array \n" + tab + "(", "\t" + tab);
            else
                    text += "\n" + tab + "[" + key + "] => " + arr[key];

    text += "\n" + (tab.substr(0, tab.length - 1)) + ")\n";

    return text;

}


function is_array(input){
        return typeof(input)=='object'&&(input instanceof Array);
}

function showAlert(msg,link,cancel,target,_callbackOK,_callbackCancel){
    
    if(link!=undefined){
        link2=link.split('(');
        if(is_array(link2) && link2.length>1){
            try{
                link2[0]=eval(link2[0]);
            }catch(err){}
        }
    }
    
    if($("div#alertaMsg").length){
       $("div#alertaMsg").remove(); 
    }
     
    
    if(link==undefined){
        $("body").prepend('<div id="alertaMsg"><div></div><p><img src="assets/images/logo/preloader.gif"/><br/>'+msg+'</p></div>');
        $("div#alertaMsg div").fadeTo(0, 0.7);
    }else if(typeof link2[0] == "function") {
        $("body").prepend('<div id="alertaMsg"><div></div><p>'+msg+'<br/><br/><a href="#" onclick="'+link+'; hideAlert();">OK</a>'+(cancel!==undefined ? '&nbsp;<a href="#" onclick="hideAlert(); return fasle;">Cancelar</a>' : '')+'</p></div>');
        $("div#alertaMsg div").fadeTo(0, 0.7);
    }else{
        if (msg !== undefined){
            if((_callbackOK!=undefined) || (_callbackCancel!=undefined)){
                
            }else{
                if (link !== undefined){
                    $("body").prepend('<div id="alertaMsg"><div></div><p>'+msg+'<br/><br/><a href="'+link+'" '+(target!=undefined ? 'target="'+target+'" onclick="hideAlert();"' : '')+'>OK</a>'+(cancel!==undefined ? '&nbsp;<a href="#" onclick="hideAlert(); return fasle;">Cancelar</a>' : '')+'</p></div>');
                    $("div#alertaMsg div").fadeTo(0, 0.7);        
                }else{
                    $("body").prepend('<div id="alertaMsg"><div></div><p>'+msg+'<br/><br/><a href="#" onclick="hideAlert(); return false;">OK</a>'+(cancel!==undefined ? '&nbsp;<a href="#" onclick="hideAlert(); return fasle;">Cancelar</a>' : '')+'</p></div>');
                    $("div#alertaMsg div").fadeTo(0, 0.7);
                }
            }
        }else{
        $("body").prepend('<div id="alertaMsg"><div></div><p>Dados enviados com sucesso!<br/><br/><a href="'+link+'" '+(target!=undefined ? 'target="'+target+'" onclick="hideAlert();"' : '')+'>OK</a>'+(cancel!==undefined ? '&nbsp;<a href="#" onclick="hideAlert(); return fasle;">Cancelar</a>' : '')+'</p></div>');
        $("div#alertaMsg div").fadeTo(0, 0.7);
        }
    }
    
    return false;

}

function hideAlert(){  
        
    $("#alertaMsg").remove();
    
    return false;
    
}




function inArray(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle) return true;
    }
    return false;
}
function txtBoxFormat(strField, sMask, evtKey,func) {
     var i, nCount, sValue, fldLen, mskLen,bolMask, sCod, nTecla;
     
        if(evtKey!==undefined){
           if(window.event) { // Internet Explorer
             nTecla = evtKey.keyCode; 
           }else if(evtKey.which) { // Nestcape / firefox
             nTecla = evtKey.which;
           }
       }
       //se for backspace não faz nada
       if (nTecla != 8){
            if(document.getElementById(strField)!=null){
                 sValue = document.getElementById(strField).value;
             }else{
                 sValue = strField.value;
             }

             fldLen = sValue.length;
             mskLen = sMask.length;

             if(mskLen && document.getElementById(strField).maxlength==undefined){
                document.getElementById(strField).maxlength = mskLen;
             }
            if(fldLen>mskLen){
                var i=0;
                var str = '';
                var len = mskLen;
                while (i < mskLen) {
                    str += ''+sValue.charAt(i);
                    i++;
                }
                document.getElementById(strField).value = str;

                if(func!=undefined && func!=null){
                        func()
                }
                return false;
            }
             // Limpa todos os caracteres de formatação que
             // já estiverem no campo.
             sValue = sValue.toString().replace( ":", "" );
             sValue = sValue.toString().replace( ":", "" );
             sValue = sValue.toString().replace( "-", "" );
             sValue = sValue.toString().replace( "-", "" );
             sValue = sValue.toString().replace( ".", "" );
             sValue = sValue.toString().replace( ".", "" );
             sValue = sValue.toString().replace( "/", "" );
             sValue = sValue.toString().replace( "/", "" );
             sValue = sValue.toString().replace( "(", "" );
             sValue = sValue.toString().replace( "(", "" );
             sValue = sValue.toString().replace( ")", "" );
             sValue = sValue.toString().replace( ")", "" );
             sValue = sValue.toString().replace( " ", "" );
             sValue = sValue.toString().replace( " ", "" );

             fldLen = sValue.length;
             mskLen = sMask.length;

             i = 0;
             nCount = 0;
             sCod = "";
             mskLen = fldLen - (evtKey.type=='keyup' ? 1 : 0);


        
            while (i <= mskLen) {
              bolMask = ((sMask.charAt(i) == "-") || (sMask.charAt(i) == ".") || (sMask.charAt(i) == "/"))
              bolMask = bolMask || ((sMask.charAt(i) == "(") || (sMask.charAt(i) == ")") || (sMask.charAt(i) == ":")|| (sMask.charAt(i) == " "))

               if (bolMask) {
                   sCod += sMask.charAt(i);
                   mskLen++; 
               }else {
                    if (sMask.charAt(i) == "9" && inArray(sValue.charAt(nCount),['0','1','2','3','4','5','5','6','7','8','9'])) {
                        sCod += sValue.charAt(nCount);
                        nCount++;
                    }
               }

              i++;
            }
            if((nTecla == 9 || nTecla == undefined) && document.getElementById(strField).value==''){
               return true;
            }
            document.getElementById(strField).value = sCod;
       }//fim do if que verifica se é backspace
}
//Fim da Função Máscaras Gerais
/***
* Observação: As máscaras podem ser representadas como os exemplos abaixo:
* CEP -> 99.999-999
* CPF -> 999.999.999-99
* CNPJ -> 99.999.999/9999-99
* Data -> 99/99/9999
* Tel Resid -> (99) 999-9999
* Tel Cel -> (99) 9999-9999
* Processo -> 99.999999999/999-99
* C/C -> 999999-!
* E por aí vai...
***/
//USO:  onkeypress="return txtBoxFormat('id_do_campo', '99999999', event);"


	function verificaEquivalencias(strField,strField2){
		if (document.getElementById(strField).value != getElementById(strField2).value)  // Aqui faz a comparação se a senha 1 confere com a senha2 
		{ 
			alert ("As senhas não Conferem"); //Dispara o alerta caso a condição não seja favorável 
			document.getElementById(strField).focus(); // Aqui manda o foco voltar para a senha1
			return false; 
		} 
		return true; 
	}//Fim da Verifica Equivalencias //USO: verificaEquivalencias(id1,id2)



	function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){
		
	    var sep = 0;
	    var key = '';
	    var i = j = 0;
	    var len = len2 = 0;
	    var strCheck = '0123456789';
	    var aux = aux2 = '';
	    var whichCode = null;
		
		
		if(window.event) { // Internet Explorer
	       whichCode = e.keyCode; }
	     else if(e.which) { // Nestcape / firefox
	       whichCode = e.which;
	     }
		
		
	    if (!((whichCode == 0) || (whichCode == 8) || (whichCode == 9) || (whichCode == 37) || (whichCode == 39) || (whichCode == null))) {
	
			key = String.fromCharCode(whichCode); // Valor para o código da Chave
			
			if (strCheck.indexOf(key) == -1) return false; // Chave inválida
			
			len = objTextBox.value.length;
			for(i = 0; i < len; i++)
				if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
			aux = '';
			for(; i < len; i++)
				if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);
			aux += key;
			len = aux.length;
			if (len == 0) objTextBox.value = '';
			if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
			if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;
			if (len > 2) {
				aux2 = '';
				for (j = 0, i = len - 3; i >= 0; i--) {
					if (j == 3) {
						aux2 += SeparadorMilesimo;
						j = 0;
					}
					aux2 += aux.charAt(i);
					j++;
				}
				objTextBox.value = '';
				len2 = aux2.length;
				for (i = len2 - 1; i >= 0; i--)
				objTextBox.value += aux2.charAt(i);
				objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
			}
			return false;
		}
	    /*
	    <form>
	    Valor R$: <input type="text" name="valor"  onKeyPress="return(MascaraMoeda(this,'.',',',event))">
	    </form>
	    */
	
	}
	

	function MascaraPerc(objTextBox, SeparadorDecimal, e){
		
	    var sep = 0;
	    var key = '';
	    var i = j = 0;
	    var len = len2 = 0;
	    var strCheck = '0123456789';
	    var aux = aux2 = '';
	    var whichCode = null;
		
		
		if(window.event) { // Internet Explorer
	       whichCode = e.keyCode; }
	     else if(e.which) { // Nestcape / firefox
	       whichCode = e.which;
	     }
		
		
	      if (!((whichCode == 0) || (whichCode == 8) || (whichCode == 9) || (whichCode == 37) || (whichCode == 39) || (whichCode == null))) {
			key = String.fromCharCode(whichCode); // Valor para o código da Chave
			
			if (strCheck.indexOf(key) == -1) return false; // Chave inválida
			
			len = objTextBox.value.length;
			for(i = 0; i < len; i++)
				if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
			aux = '';
			for(; i < len; i++)
				if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);
			aux += key;
			len = aux.length;
			if (len == 0) objTextBox.value = '';
			if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
			if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;
			if (len > 2) {
				aux2 = '';
				for (j = 0, i = len - 3; i >= 0; i--) {
					if (j == 3) {
						return false;
						aux2 += SeparadorMilesimo;
						j = 0;
					}
					aux2 += aux.charAt(i);
					j++;
				}
				objTextBox.value = '';
				len2 = aux2.length;
				for (i = len2 - 1; i >= 0; i--)
				objTextBox.value += aux2.charAt(i);
				objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
			}
			return false;
		 }
	
	}



    function replaceAll(str, de, para){
        var pos = str.indexOf(de);
        while (pos > -1){
                    str = str.replace(de, para);
                    pos = str.indexOf(de);
            }
        return (str);
    }

    function is_object(input){
        return typeof(input)=='object';
    }
    function is_string(input){
        return typeof(input)=='string';
    }
    function is_array(input){
        return typeof(input)=='object'&&(input instanceof Array);
    }
    
    
    
    function retirarAcento(strText) {
        var varString = new String(strText);
        var stringAcentos = new String('àâêôûãõáéíóúçüÀÂÊÔÛÃÕÁÉÍÓÚÇÜ');
        var stringSemAcento = new String('aaeouaoaeioucuAAEOUAOAEIOUCU');

        var i = new Number();
        var j = new Number();
        var cString = new String();
        var varRes = '';

        for (i = 0; i < varString.length; i++) {
        cString = varString.substring(i, i + 1);
        for (j = 0; j < stringAcentos.length; j++) {
        if (stringAcentos.substring(j, j + 1) == cString){
        cString = stringSemAcento.substring(j, j + 1);
        }
        }
        varRes += cString;
        }
        return varRes;
    }
    
    
    
  
    function atualizarElemento(element,url,_callback){
        if($(element).length!==undefined && $(element).length>1){
            element = $(element).eq($(element).length-1);
        }
        
         var div_ELEMENT = element;
        
        if($(element).attr('id')!=undefined && url!=undefined && url!=''){
            
            loadConteudo(element,url,'','','',function(){
                datepicker();
                var encontrou=false;
                $.each($(div_ELEMENT).find('input, select, textarea').not('input[type=hidden]'),function(i,el){
                    if($(el).val()=='' && !encontrou){
                        $(el).focus();
                        encontrou = true;
                    }
                });
                if(_callback!=undefined){
                   if(typeof _callback == 'string'){eval(_callback);}else{_callback();}
                }
            });
            
        }
    }
    
    

    function loadConteudo(div,url,msg,not_ajax,elementRefresh,_callBack){
        try{
            if($(div).length!==undefined && $(div).length>1){
                div = $(div).eq($(div).length-1);
            }
        
            var date = new Date();
            var components = [
                date.getYear(),
                date.getMonth(),
                date.getDate(),
                date.getHours(),
                date.getMinutes(),
                date.getSeconds(),
                date.getMilliseconds()
            ];

            var timeid = components.join("");
            $(div).css("overflow","hidden");

            var urlLoaded = url;
            var contentLoaded = '';
            
            if(url.indexOf(' #')!=-1){
                urlLoaded = url.split(" #")[0];
                contentLoaded = url.split(" #")[1];
            }
            if(contentLoaded!=''){
                contentLoaded = replaceAll(replaceAll(contentLoaded, ' ',''), '#','');
            }
            urlLoaded = urlLoaded.trim();
            contentLoaded = contentLoaded.trim();
            
                        
             $.ajax({
                type: 'POST',
                url: urlLoaded,
                cache: false,
                success: function(response){
                    if(contentLoaded!='' && $(response).find('#'+contentLoaded).length){ 
                        response = $(response).find('#'+contentLoaded).eq(0);
                    }
                    var THIS = div;
                    var fadeoOutDone = $(THIS).fadeOut('fast').promise();
                    fadeoOutDone.then(function(){
                        $(THIS).html(response);
                        
                       if ($('select').length) {
                          // Traverse through all dropdowns
                          $.each($('select'), function (i, val) {
                              var $el = $(val);
                              if (!$el.val()) {
                                  $el.addClass("not_chosen");
                              }
                              $('body').delegate($el,"change", function () {
                                  if (!$el.val())
                                      $el.addClass("not_chosen");
                                  else
                                      $el.removeClass("not_chosen");
                              });
                        });
                       }
                       
                        if($(THIS).find('#'+$(THIS).attr('id')).html()!=undefined){
                            $(THIS).html( $(THIS).find('#'+$(THIS).attr('id')).html() );
                        }
                        
                       $(THIS).css("overflow","");
                        
                        var fadeoInDone = $(THIS).fadeIn('fast').promise();
                        fadeoInDone.then(function(){
                            if($(THIS).find('form.sistema').length){
                                 $(THIS).find('form.sistema').eq(0).find('input,select,textarea').not('[type=hidden],[type=file],[type=image]').eq(0).focus();
                            }
                            if(_callBack!=undefined){
                            _callBack();
                            }
                         });
                        return true;
                    });
                    return true;
                },
                    error : function(response){
                        alert( "Reuisição falhou: " + response.statusText+'.','erro' );
                    },
                    timeout : function(response){
                        alert( "Servidor demorou muito a responder.",'erro' );
                    },
                    abort : function(response){
                        alert( "Processamento abortado.",'erro' );
                    },
                complete : function(){
                }
            });
        
        }catch (exception) {
            alert('Erro ao processar o carregamento do conteúdo!<br/>Consulte o administrador.'+(exception.message ? '<br/>'+exception.message:''),'alerta');
        }

    }
    

$.isNaUNE = function(value){
    return (typeof(value) !== 'undefined' && value !== null && value !== '' && value !== undefined && value !== 'undefined' && value !== 'null');
};


$.isTrue = function(value){
    return (value===true || value==1 || value=="true" || value=="1"|| value=="S");
};
/*
var tentativarConexao = 0;
var timeOutConexao = null;
   function testaConexao(){
        clearInterval(timeOutConexao);
         $.ajax({
            url: './testaConexao',
            dataType: "json"
          }).done(function(data) {
              if(data.nr){
                tentativarConexao = 0;
              }else{
                tentativarConexao++;
              }
          }).fail(function(jqXHR, textStatus){
              tentativarConexao++;
              if(tentativarConexao>5){
                showAlert('Você parece estar sem conexão!');
              }
          }).always(function(){
                timeOutConexao = setTimeout(testaConexao,5000);
            });
    }
    timeOutConexao = setTimeout(testaConexao,5000);
*/