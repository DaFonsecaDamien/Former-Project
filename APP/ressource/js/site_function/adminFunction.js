
// Fonction pour la gestion des pages en mode reactif
function homePage(){
    document.getElementById("gestion_mail").style.display = "none";
    document.getElementById("gestion_event").style.display = "none";
    document.getElementById("gestion_chat").style.display = "none";
    document.getElementById("gestion_user").style.display = "none";
    document.getElementById("home").style.display = "block";
}
function userPage() {
    document.getElementById("gestion_mail").style.display = "none";
    document.getElementById("gestion_event").style.display = "none";
    document.getElementById("gestion_chat").style.display = "none";
    document.getElementById("home").style.display = "none";
    document.getElementById("gestion_user").style.display = "block";
}
function chatPage(){
    document.getElementById("gestion_mail").style.display = "none";
    document.getElementById("gestion_event").style.display = "none";
    document.getElementById("home").style.display = "none";
    document.getElementById("gestion_user").style.display = "none";
    document.getElementById("gestion_chat").style.display = "block";
}
function eventPage(){
    document.getElementById("gestion_mail").style.display = "none";
    document.getElementById("home").style.display = "none";
    document.getElementById("gestion_user").style.display = "none";
    document.getElementById("gestion_chat").style.display = "none";
    document.getElementById("gestion_event").style.display = "block";
}
function mailPage(){
    document.getElementById("home").style.display = "none";
    document.getElementById("gestion_user").style.display = "none";
    document.getElementById("gestion_chat").style.display = "none";
    document.getElementById("gestion_event").style.display = "none";
    document.getElementById("gestion_mail").style.display = "block";
}

// Fonction pour Edit une table en mode reactif
function edit_user_table(id, text, column_name){

    $.ajax({
        url:"../controller/admin_controller/gestion_user/modifUserAdmin-traitement.php",
        method:"POST",
        data:{id:id, text:text, column_name:column_name},
        dataType:"text",
        success:function(data){
            Swal.fire({
                type: 'success',
                title: 'Validation',
                text: data,
            });
        }
    });
}

// Fonction pour Edit une table en mode reactif
function edit_chat_table(id, text, column_name){

    $.ajax({
        url:"../controller/admin_controller/gestion_chat/modifChatAdmin-traitement.php",
        method:"POST",
        data:{id:id, text:text, column_name:column_name},
        dataType:"text",
        success:function(data){
            Swal.fire({
                type: 'success',
                title: 'Validation',
                text: data,
            });
        }
    });
}

// Fonction pour Edit une table en mode reactif
function edit_event_table(id, text, column_name){

    $.ajax({
        url:"../controller/admin_controller/gestion_event/modifEventAdmin-traitement.php",
        method:"POST",
        data:{id:id, text:text, column_name:column_name},
        dataType:"text",
        success:function(data){
            Swal.fire({
                type: 'success',
                title: 'Validation',
                text: data,
            });
        }
    });
}



//Fonction pour la creation des tableaux et la gestion des evenement (EventListenner)
$(document).ready( function () {

    // TABLEAU DE User
    $('#gestion_user_table').DataTable({
      responsive: true,
    }).on('click', '#btn_add_user', function(){

      var nom = $('#inputNom').val();
      var prenom = $('#inputPrenom').val();
      var email = $('#inputEmail').val();
      var adresse = $('#inputAdresse').val();
      var telephone = $('#inputTelephone').val();
      var dateNaissance = $('#inputDateNaissance').val();

      if(nom == "" || prenom == "" || email == "" || adresse == "" || telephone == "" || dateNaissance == ""){
        Swal.fire({
            title: 'Erreur',
            text:   'Un des champs est vide !', 
          })
        return false;
      }

      $.ajax({
        url:"../controller/admin_controller/gestion_user/ajoutUserAdmin-traitement.php",
        method: "POST",
        data:{nom:nom, prenom:prenom, email:email, adresse:adresse, telephone:telephone, dateNaissance:dateNaissance},
        dataType:"text",
        success:function(data){
          Swal.fire({
            type: 'success',
            title: 'Validation',
            text: data,
          });
          fetch_data();
        }
      });
    }).on('click', '#btn_delete_user', function(){
        var id = $(this).data("id7");
        if(confirm("Etes-vous sur de vouloir supprimer ceci ?")){
            $.ajax({
                url:"../controller/admin_controller/gestion_user/deleteUserAdmin-traitement.php",
                method: "POST",
                data:{id:id},
                dataType:"text",
                success:function(data){
                    Swal.fire({
                        type: 'success',
                        title: 'Validation',
                        text: data,
                    });
                    fetch_data();
                }
            });
        }
    }).on('blur', '#nom', function(){
        var id = $(this).data("id1");
        var nom = $(this).text();
        edit_user_table(id, nom, "nom");
    }).on('blur', '#prenom', function(){
        var id = $(this).data("id2");
        var prenom = $(this).text();
        edit_user_table(id, prenom, "prenom");
    }).on('blur', '#email', function(){
        var id = $(this).data("id3");
        var email = $(this).text();
        edit_user_table(id, email, "email");
    }).on('blur', '#adresse', function(){
        var id = $(this).data("id4");
        var adresse = $(this).text();
        edit_user_table(id, adresse, "adresse");
    }).on('blur', '#telephone', function(){
        var id = $(this).data("id5");
        var telephone = $(this).text();
        edit_user_table(id, telephone, "telephone");
    }).on('blur', '#dateNaissance', function(){
        var id = $(this).data("id6");
        var dateNaissance = $(this).text();
        edit_user_table(id, dateNaissance, "dateNaissance");
    });

    // TABLEAU DE CHAT
    $('#gestion_chat_table').DataTable({
      responsive: true,
    }).on('click', '#btn_add_chat', function(){
      var objet = $('#inputObjet').val();
      var contenuChat = $('#inputContenuChat').val();

      if(objet == "" || contenuChat == ""){
        Swal.fire({
            title: 'Erreur',
            text:   'Un des champs est vide !',
          })
        return false;
      }
      $.ajax({
        url:"../controller/admin_controller/gestion_chat/ajoutChatAdmin-traitement.php",
        method: "POST",
        data:{objet:objet, contenuChat:contenuChat},
        dataType:"text",
        success:function(data){
          Swal.fire({
            type: 'success',
            title: 'Validation',
            text: data,
          });
          fetch_data();
        }
      });  
    }).on('click', '#btn_delete_chat', function(){
        var id = $(this).data("id4");
        if(confirm("Etes-vous sur de vouloir supprimer ceci ?")){
            $.ajax({
                url:"../controller/admin_controller/gestion_chat/deleteChatAdmin-traitement.php",
                method: "POST",
                data:{id:id},
                dataType:"text",
                success:function(data){
                    Swal.fire({
                        type: 'success',
                        title: 'Validation',
                        text: data,
                    });
                    fetch_data();
                }
            });
        }
    }).on('blur', '#pseudo', function(){
        var id = $(this).data("id1");
        var pseudo = $(this).text();
        edit_chat_table(id, pseudo, "pseudo");
    }).on('blur', '#objet', function(){
        var id = $(this).data("id2");
        var objet = $(this).text();
        edit_chat_table(id, objet, "objet");
    }).on('blur', '#contenuChat', function(){
        var id = $(this).data("id3");
        var contenuChat = $(this).text();
        edit_chat_table(id, contenuChat, "contenu");
    });

    // TABLEAU DE EVENT
    $('#gestion_event_table').DataTable({
      responsive: true,
    }).on('click', '#btn_add_event', function(){
      var date = $('#inputDate').val();
      var titre = $('#inputTitre').val();
      var contenuEvent = $('#inputContenuEvent').val();
      var photo = $('#inputPhoto').val();

      if(date == "" || titre == "" || contenuEvent == "" || photo == ""){
        Swal.fire({
            title: 'Erreur',
            text: 'Un des champs est vide !',
          })
        return false;
      }

      $.ajax({
        url:"../controller/admin_controller/gestion_event/ajoutEventAdmin-traitement.php",
        method: "POST",
        data:{date:date, titre:titre, contenuEvent:contenuEvent, photo:photo},
        dataType:"text",
        success:function(data){
          Swal.fire({
            type: 'success',
            title: 'Validation',
            text: data,
          });
          fetch_data();
        }
      });
    }).on('click', '#btn_delete_event', function(){
        var id = $(this).data("id5");
        if(confirm("Etes-vous sur de vouloir supprimer ceci ?")){
            $.ajax({
                url:"../controller/admin_controller/gestion_event/deleteEventAdmin-traitement.php",
                method: "POST",
                data:{id:id},
                dataType:"text",
                success:function(data){
                    Swal.fire({
                        type: 'success',
                        title: 'Validation',
                        text: data,
                    });
                    fetch_data();
                }
            });
        }
    }).on('blur', '#date', function(){
        var id = $(this).data("id1");
        var date = $(this).text();
        edit_event_table(id, date, "date");
    }).on('blur', '#titre', function(){
        var id = $(this).data("id2");
        var titre = $(this).text();
        edit_event_table(id, titre, "titre");
    }).on('blur', '#contenu', function(){
        var id = $(this).data("id3");
        var contenu = $(this).text();
        edit_event_table(id, contenu, "contenu");
    }).on('blur', '#photo', function(){
        var id = $(this).data("id4");
        var photo = $(this).text();
        edit_event_table(id, photo, "photo");
    });
    
  });
  
