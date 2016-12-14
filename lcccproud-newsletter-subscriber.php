<?php
/*
Plugin Name: LCCCProud Newsletter Subscriber
Plugin URI: http://www.lcccproud.com
Description: 
Version: 0.1
Author: David Brattoli
Author Email: webmaster@lorainccc.edu
License:

  Copyright 2011 David Brattoli (webmaster@lorainccc.edu)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as 
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
  
*/


/* Start Adding Functions Below this Line */
class LCCCPoudNewsletterWidget extends WP_Widget {

	function LCCCPoudNewsletterWidget() {
		// Instantiate the parent object
		parent::__construct( false, 'LCCC Newletter Subscribe Link Widget' );
	}//closes the function LCCCPoudNewsletterWidget

	function widget( $args, $instance ) {
	// Widget output
	?>
    <script>
var md_required_arr=new Array(Array("optin_email","te"))

function md_checkEmail(myEmail) {
var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,8})$/;
if(reg.test(myEmail)) return 1;
else return 0;
}

function md_checkRadio(obj){
var result=0;
obj=document.md_optin[obj];
for(var i=0;i<obj.length;i++){
  if(obj[i].checked==true) return 1;
}
return 0;
}

function md_validation(){
var md_temp,flag_err,f_unsub;
f_unsub=(document.getElementById("md_unsubscribe").checked==true)?1:0;
for(md_i in md_required_arr){
  switch(md_required_arr[md_i][1]){
   case "te":
    if(md_checkEmail(document.getElementById("md_"+md_required_arr[md_i][0]).value) || (md_required_arr[md_i][0]!="optin_email" && f_unsub)) md_temp="md_norm";
    else {md_temp="md_err";flag_err=1;}
    document.getElementById("md_"+md_required_arr[md_i][0]+"_td").className=md_temp;
    break;
   case "t":
    if(document.getElementById("md_"+md_required_arr[md_i][0]).value!="" || f_unsub) md_temp="md_norm";
    else {md_temp="md_err";flag_err=1;}
    document.getElementById("md_"+md_required_arr[md_i][0]+"_td").className=md_temp;
    break;
   case "c":
    if(document.getElementById("md_"+md_required_arr[md_i][0]).checked || f_unsub) md_temp="md_norm";
    else {md_temp="md_err";flag_err=1;}
    document.getElementById("md_"+md_required_arr[md_i][0]+"_td").className=md_temp;
    break;
   case "r":
    if(md_checkRadio(md_required_arr[md_i][0]) || f_unsub) md_temp="md_norm";
    else {md_temp="md_err";flag_err=1;}
    document.getElementById("md_"+md_required_arr[md_i][0]+"_td").className=md_temp;
    break;
   case "s":
    if(document.getElementById("md_"+md_required_arr[md_i][0]).selectedIndex || f_unsub) md_temp="md_norm";
    else {md_temp="md_err";flag_err=1;}
    document.getElementById("md_"+md_required_arr[md_i][0]+"_td").className=md_temp;
    break;
   default:
  }
}
return (flag_err)?false:true;
return true;
}
</script>
		<div id="newlettersubscribelink" data-reveal>
    		<a  href="#" data-reveal data-reveal-id="subscribewindow">Subcribe to the LCCC Proud Newsletter</a>
		</div>
          <div id="subscribewindow" class="reveal-modal" data-reveal>
          <!--start md optin form-->
<form method="post" name="md_optin" target="md_optin_form_result" action="http://maildogmanager.com/optin.html" onSubmit="if(md_validation()==true) window.open('', 'md_optin_form_result', 'width=600,height=300,status=yes,resizable=yes,scrollbars=yes'); else return false">
			<input type="hidden" name="client" value="usrC3prd">
			<input type="hidden" id="md_listid" name="listid" value="sl">
			<input type="hidden" id="md_subscribe_confirm" name="subscribe_confirm" value="68">

			<table class="proudsubscribetable" cellspacing="2" cellpadding="2" id="md_optin_tbl">
			<tr class="formheader">
            	<h1>Subscription Preferences</h1>
                <p> To subscribe to the newletter please enter your email address and click the go button.
           	</tr>
            <tr style="background-color:#FFFFFF;">
            
            <div style="float:left">
            <span class="md_required">*</span><p class="proudformemail">Your Email:</p>
            </div>
            
            <div class="proudformemailinput" id="md_optin_email_td"><input type="text" id="md_optin_email" name="optin_email" size="25" maxlength="80"></div>
            
            </tr>
			<tr style="display:none;">
            <td>
            </td>
            <td>
			<input type="radio" name="optin_action" id="md_subscribe" value="subscribe" checked> <label for="md_subscribe">Subscribe</label><br>
			<input type="radio" name="optin_action" id="md_unsubscribe" value="unsubscribe"> <label for="md_unsubscribe">Unsubscribe</label>
			</td>
            </tr>
			<tr style="background-color:#FFFFFF;">
           	<td><span class="md_required">* required field</span></td>
            	<td><input type="submit" name="submit" value="Submit"></td>
            </tr>
			<tr style="background-color:#FFFFFF;">
            <td> </td>
            </tr>
			</table>
            <div>
            	<img src="<?php echo get_template_directory_uri(); ?>/images/LCCC-logo.png"/>
            </div>
		</form>
		<!--end md optin form-->

           <a class="close-reveal-modal">&#215;</a>
          </div>

	<?php
    }//closes the function widget

	function update( $new_instance, $old_instance ) {
		// Save widget options
	}//closes the function update

	function form( $instance ) {
		// Output admin widget options form
	}//closes function form
}// this closes the class LCCCPoudNewsletterWidget

function lcccproud_register_widgets() {
	register_widget( 'LCCCPoudNewsletterWidget' );
}//clsoes the register function

add_action( 'widgets_init', 'lcccproud_register_widgets' );

?>