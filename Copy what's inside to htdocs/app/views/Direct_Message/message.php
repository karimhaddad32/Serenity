
<?php $this->view('/Shared/top_nav_bar_main'); 	 ?>
	<a href="/direct_message/index">Back to Messages</a>

	<div class="container">
	<h1 style="text-align: center">Chat</h1>
	<!-- <?php echo $model->first_name, ' ',$model->last_name; ?> -->
</div>

<div class="container" style="display: grid; grid-template-columns: auto;">
<div class="container">
	<form method='post'>
		<input type='text' name='message' />
		<input type='submit' name='action' value='Send' />
	</form>
</div>

<table style="border: 1px solid black; background-color:#bfe2ff;">
	<tr>
		<th style="text-align: center">Chat</th><!-- 
		<th>receiver</th>
		<th>message text</th>
		<th>time</th> -->
	</tr>

<?php

foreach ($model->messages as $direct_message) {
	// echo "<pre>";
	// 	var_dump($direct_message);
	// echo "</pre>";

	if ($direct_message->sender_id == $_SESSION['user_id']) {
		echo "<tr>
				<td style=float:right;color:FFFFFF;background-color:#0000FF;>$direct_message->message_content</td>";
	} else {
		echo "<tr>
		<td style=float:left;background-color:#CCCCCC>$direct_message->message_content</td>";
	}

	echo "</tr>";
}

?>

</table>
</div>

<?php 

// $current_user_id = $_SESSION['user_id'];

// echo  "<script>
//     \$(document).ready(function () {
//         var element = document.getElementById('messages_panel');
//         element.scrollTop = element.scrollHeight;

//         \$('#btn_send').unbind().click(function () {
//         	console.log('asd');
//             var text = document.getElementById('text');
//             var msg = {};
//             msg.message1 = text.value;
//             msg.receiver_id = $model->other_profile;
//             msg.sender_id = $current_user_id;

//             console.log(msg);

//             \$.ajax({
//                 type: 'POST',
//                 url: '/Direct_Message/message',
//                 data: '{msg: msg}',
//                 dataType: 'json',
//                 contentType: 'application/json; charset=utf-8',
//                 success: function (res) {

//                     if (res != null) {
//                     console.log(res);
//                     var chat = document.getElementById('messages_panel');
//                         console.log(chat);

//                         var newText = '<div class='message last' style = 'display:inline-flex' ><div class='wrap1'>'
//                             + text.value + '</div><p style='font-size:10px;margin:0px 0px 5px 5px;'>'
//                             + res.timestamp + '</p></div>'
//                         var wrapper = document.createElement('div');
//                         wrapper.className = 'mine messages';
//                         wrapper.innerHTML = newText;
//                         if (chat.children.length == 0) {
//                              chat.appendChild(wrapper);
//                         } else {
//                                if (chat.children[chat.children.length - 1].className == 'mine messages') {
//                             chat.children[chat.children.length - 1].firstElementChild.classList.remove('last');
//                             }
//                             chat.appendChild(wrapper);
//                         }

//                     element.scrollTop = element.scrollHeight;
//                         text.value = '';
//                          }
//                 },
//                 error: function () {
//                    //nothing
//                 }
//             });
    
//         });
//     });
// </script>";

?>


<!-- <div class="chat" style="overflow:auto; overflow-x: hidden; height:400px;max-height: 400px; background-color:lightblue " id="messages_panel" > -->

   <?php  

   // foreach ($model->messages as $message)
   //  {
   //      if ($message->sender_id == $current_user_id)
   //      {
   //          echo "<script>
   //              var chat = document.getElementById('messages_panel');

   //              if (chat.children[chat.children.length - 2].className == 'mine messages') {
   //                  chat.children[chat.children.length - 2].firstElementChild.classList.remove('last');
   //              }
   //          </script>
   //          <div class='mine messages' >
   //              <div class='message last' style='display:inline-flex;'>
   //                  <div class='wrap1'>$message->message_content</div><p style='font-size:10px;margin:0px 0px 5px 5px;'>$message->timestamp</p>
   //              </div>
   //          </div>";
   //      }
   //      else
   //      {
   //      	echo "<script>
   //              var chat = document.getElementById('messages_panel');

   //              if (chat.children[chat.children.length - 2].className == 'yours messages') {
   //                  chat.children[chat.children.length - 2].firstElementChild.classList.remove('last');
   //              }
   //          </script>
   //          <div class='yours messages'>
   //              <div class='message last' style='display:inline-flex; color:black'>
   //                  <p style='font-size:10px;margin:0px 5px 5px 0px;  '>$message->timestamp</p>
   //                  <div class='wrap1'>$message->message_content</div>
   //              </div>
   //          </div>";
            
   //      }

   //  }
     ?>
<!-- </div> -->

<!-- 
<input type="text" name="message" class="" placeholder="Message here" id="text" style="width:100%; margin:5px; min-width:80%; position:sticky">
<input id="btn_send" type="submit" name="message" class="btn btn-primary" style="margin: 5px" value="Send" >

 -->