<div id="content_wide">

	<?= $cart_progress ?>
	<div class="clear"></div>
	    
	<p><strong>Please remember</strong> to scroll to the a bottom and initial the <strong>REQUIRED</strong> wavier field. You may purchase a class for another individual but they are an adult or not your ward/child then a separate waiver is required. <strong>For two or more students</strong> use the additional participant field(s) and proceed to payment. For questions about registration <strong>call or send an email </strong>to our registrar...</p>
	<p>Molly Strand at <strong><span class="tele">(866) 400-3652</span></strong>  or <a href="../contact.php" target="_blank">email her</a></p>
		<form id="details" name="details" method="post" action="step3.php">
                        <table width="595" border="0" cellpadding="5" cellspacing="0" bgcolor="#DCEEC5">
                          <tr>
                            <td width="325"><strong>Name of adult student </strong>or parent<strong>*</strong><br />
                            <input name="name" type="text" id="name" /></td>
                            <td width="250"><strong>Email*<br />
                            </strong>
                              <input name="email" type="text" id="email" />
                            <br /></td>
                          </tr>
                          <tr>
                            <td><strong>Phone*</strong><br />
                            <input name="phone1" type="text" id="phone1" /></td>
                            <td><strong>Alternate Phone</strong><br />
                              <input name="phone2" type="text" id="phone2" />
                            <br /></td>
                          </tr>
                          <tr>
                            <td><strong>Emergency Contact Name*
                              <input name="emergency" type="text" id="emergency" />
                            </strong></td>
                            <td><strong>Emergency Phone*<br />
                            <input name="ephone" type="text" id="ephone" />
                            </strong></td>
                          </tr>
                          <tr>
                            <td colspan="2"><strong>How did you find us? (i.e. search, google ad, friend, wood elf)<br />
                                <input name="reference" type="text" id="reference" size="66" />
                            </strong></td>
                          </tr>
                          <tr>
                            <td bgcolor="#FFFFFF">&nbsp;</td>
                            <td bgcolor="#FFFFFF">&nbsp;</td>
                          </tr>
                        </table>
		<table width="595" border="0" cellpadding="9" cellspacing="0" bgcolor="#DCEEC5">
                          <tr>
                          <td><strong class="title16pxNoPad">Participant #1</strong></td>
                          </tr>
                          <tr>
                            <td width="195"><strong>Name</strong> or nickname<br />
                              <strong>
                            <input name="namea" type="text" id="namea" />
                            </strong></td>
                            <td width="380" rowspan="6"><strong>List classes for participant
                              #1</strong> <em>if more than one participants<br />                              
                              </em>
                              <textarea name="classes" cols="43" rows="3" id="classes"></textarea>
                              <br />                            
                              <strong>List any allergies</strong> <br />
                              <textarea name="allergy" cols="43" rows="3" id="allergy"></textarea>                              <br />
                              <strong>List regular medications <br />
                              <textarea name="medication" cols="43" rows="3" id="medication"></textarea>
                                <br />
		List any restrictions for medical reasons</strong> <br />
		<textarea name="restriction" cols="43" rows="3" id="restriction"></textarea></td>
                          </tr>
                          <tr>
                            <td height="43"><strong>Date of Birth</strong> * (mm/dd/yy)<br />
                             
                            <input name="dateofbirth" type="text" id="dateofbirth" value="01/01/07" /></td>
                          </tr>
                          <tr>
                            <td><strong>Physician's Name <br />
                            <input name="physname" type="text" id="physname" />
                            </strong></td></tr>
                          <tr>
                            <td><strong>Physician's Phone <br />
                            <input name="physphone" type="text" id="physphone" />
                            </strong></td></tr>
                          <tr>
                            <td><strong>Insurance Company</strong> <br />
                            <input name="insurance" type="text" id="insurance" /></td></tr>
                          <tr>
                            <td><strong>Insurance Number <br />
                            <input name="insurancenumber" type="text" id="insurancenumber" />
                            </strong></td></tr>
                          <tr>
                            <td colspan="2"><strong>This is the place for any special notes</strong> i.e. vegetarian, diet, excited about program <br />
                            <textarea name="special" cols="69" rows="2" id="special"></textarea></td></tr>
                          <tr>
                            <td colspan="2"><em>Only if a child</em><strong> School Name or Personal Learning Philosophy<br />
                                <input name="schoola" type="text" id="schoola" size="70" />
                                                        </strong></td>
                          </tr>
                        </table>
        <p class="title12pxNoPad"><strong>If only one participant</strong> <span class="colorBold">scroll down</span> to <strong>read and initial waiver</strong> form. Initials required</p>
              <table width="595" border="0" cellpadding="9" cellspacing="0" bgcolor="#E9EDE3">
                <tr>
                  <td><strong class="title16pxNoPad">Participant #2</strong></td>
                </tr>
                <tr>
                  <td width="195"><strong>Name</strong> or nickname<br />
                      <strong>
                      <input name="nameb" type="text" id="nameb" />
                    </strong></td>
                  <td width="380" rowspan="6"><strong>List classes for participant
                    #1</strong> <em>if more than one participants<br />
                                    </em>
                    <textarea name="classesb" cols="43" rows="3" id="classesb"></textarea>
                                    <br />
                                    <strong>List any allergies</strong> <br />
                    <textarea name="allergyb" cols="43" rows="3" id="allergyb"></textarea>
                                    <br />
                                    <strong>List regular medications <br />
                                    <textarea name="medicationb" cols="43" rows="3" id="medicationb"></textarea>
                                    <br />
                                      List any restrictions for medical reasons</strong> <br />
                  <textarea name="restrictionb" cols="43" rows="3" id="restrictionb"></textarea></td>
                </tr>
                <tr>
                  <td height="43"><strong>Date of Birth</strong> * (mm/dd/yy)<br />
                  <input name="dateofbirthb" type="text" id="dateofbirthb" value="01/01/07" /></td>
                </tr>
                <tr>
                  <td><strong>Physician's Name <br />
                    <input name="physnameb" type="text" id="physnameb" />
                  </strong></td>
                </tr>
                <tr>
                  <td><strong>Physician's Phone <br />
                    <input name="physphoneb" type="text" id="physphoneb" />
                  </strong></td>
                </tr>
                <tr>
                  <td><strong>Insurance Company</strong> <br />
                    <input name="insuranceb" type="text" id="insuranceb" /></td>
                </tr>
                <tr>
                  <td><strong>Insurance Number <br />
                    <input name="insurancenumberb" type="text" id="insurancenumberb" />
                  </strong></td>
                </tr>
                <tr>
                  <td colspan="2"><strong>This is the place for any special notes</strong> i.e. vegetarian, diet, excited about program <br />
                  <textarea name="specialb" cols="69" rows="2" id="specialb"></textarea></td>
                </tr>
                <tr>
                  <td colspan="2"><em>Only if a child</em><strong> School Name or Personal Learning Philosophy<br />
                      <input name="schoolb" type="text" id="schoolb" size="70" />
                  </strong></td>
                </tr>
              </table>
        <p>&nbsp;</p>
              <table width="595" border="0" cellpadding="9" cellspacing="0" bgcolor="#E9EDE3">
                <tr>
                  <td><strong class="title16pxNoPad">Participant #3</strong></td>
                </tr>
                <tr>
                  <td width="195"><strong>Name</strong> or nickname<br />
                      <strong>
                      <input name="namec" type="text" id="namec" />
                    </strong></td>
                  <td width="380" rowspan="6"><strong>List classes for participant
                    #1</strong> <em>if more than one participants<br />
                                    </em>
                    <textarea name="classesc" cols="43" rows="3" id="classesc"></textarea>
                                    <br />
                                    <strong>List any allergies</strong> <br />
                    <textarea name="allergyc" cols="43" rows="3" id="allergyc"></textarea>
                                    <br />
                                    <strong>List regular medications <br />
                                    <textarea name="medicationc" cols="43" rows="3" id="medicationc"></textarea>
                                    <br />
                                      List any restrictions for medical reasons</strong> <br />
                  <textarea name="restrictionc" cols="43" rows="3" id="restrictionc"></textarea></td>
                </tr>
                <tr>
                  <td height="43"><strong>Date of Birth</strong> * (mm/dd/yy)<br />
                  <input name="dateofbirthc" type="text" id="dateofbirthc" value="01/01/07" /></td>
                </tr>
                <tr>
                  <td><strong>Physician's Name <br />
                    <input name="physnamec" type="text" id="physnamec" />
                  </strong></td>
                </tr>
                <tr>
                  <td><strong>Physician's Phone <br />
                    <input name="physphonec" type="text" id="physphonec" />
                  </strong></td>
                </tr>
                <tr>
                  <td><strong>Insurance Company</strong> <br />
                    <input name="insurancec" type="text" id="insurancec" /></td>
                </tr>
                <tr>
                  <td><strong>Insurance Number <br />
                    <input name="insurancenumberc" type="text" id="insurancenumberc" />
                  </strong></td>
                </tr>
                <tr>
                  <td colspan="2"><strong>This is the place for any special notes</strong> i.e. vegetarian, diet, excited about program <br />
                  <textarea name="specialc" cols="69" rows="2" id="specialc"></textarea></td>
                </tr>
                <tr>
                  <td colspan="2"><em>Only if a child</em><strong> School Name or Personal Learning Philosophy<br />
                      <input name="schoolc" type="text" id="schoolc" size="70" />
                  </strong></td>
                </tr>
              </table>
        <p class="waiver"><strong>For all applicants/participants, and parents or legal guardians of minor applicant/participants:</strong> In consideration for being allowed to participate in the programs offered by TRACKERS EARTH, INC, dba TRACKERSNW (&quot;TRACKERS&quot;), the person(s) signing electronically below agree(s) to the following WAIVER AND RELEASE. In the case of applicants/participants who are children under the age of 18, (a) the adult signing below confirms that s/he is the parent or legal guardian of the above-named child, and (b) the electronic signature of BOTH the minor child applicant/participant and his or her parent or guardian, is required. </p>
        <p class="waiver">I and/or my children/wards have my permission to participate in all sessions and field trip activities offered by TRACKERS. In case of emergency, I hereby request and authorize any physician, hospital and health care provider to provide medical treatment promptly for me and/or my children/wards, whether or not I may be contacted and informed. To my knowledge the applicant/participant is in good physical and mental health, and knows of no reason why the applicant/participant cannot participate in all activities offered to him or her.  THE UNDERSIGNED IS AWARE THAT SUCH PROGRAMS COULD INCLUDE HAZARDOUS ACTIVITY, AND THAT THE APPLICANT/PARTICIPANT COULD BE SERIOUSLY INJURED OR EVEN KILLED.  BY ELECTRONICALLY SIGNING THIS RELEASE AND WAIVER THE UNDERSIGNED AGREES TO ASSUME THE FULL RISK OF INJURY OR DAMAGE RESULTING IN ANY MANNER FROM APPLICANT/PARTICIPANT'S PARTICIPATION IN TRACKERS PROGRAMS.</p>
        <p class="waiver"><strong>In consideration of TRACKERS' agreement to allow applicant/participant to participate in TRACKERS programs, the undersigned, on behalf of applicant/participant and his or her heirs and assigns, hereby releases, waives, indemnifies and discharges TRACKERS and all of its instructors, employees, officers, directors, agents, sponsors and volunteers (collectively, &quot;Releasees&quot;) from any and all actions, claims, or demands that applicant/participant and his or her assignees, heirs, distributees, guardians, next of kin, spouse and/or legal representatives now have, or may have in the future, for injury, disability, death, or property damage, whether arising from the negligence of Releasees or otherwise, related to (a) participation in TRACKERS activities, (b) the negligence or other acts, whether directly connected to these activities or not, and however caused, by any Releasee, or (c) the condition of the premises where these activities occur, whether or not applicant/participant is then participating in the activities.</strong> TRACKERS has the right to use applicant/participant drawings, journal excerpts, videos and any photos taken for promotional purposes for itself and affiliates.</p>
		<p class="waiver">
		<input name="photographed" type="checkbox" id="photographed" value="no-permission" />
                          <em>Only check if you or children <strong>MAY NOT</strong> be photographed, videotaped or quoted for publicity. Unchecked means consent to media release. We request that you leave unchecked as Trackers often documents programs for parents to see what their children experienced or for educational purposes.</em></p>
        <input name="newsletter" type="checkbox" id="newsletter" value="yes-updates" checked="checked" />
                                                  I wish to recieve updates for future Trackers events and programs.
		<p class="waiver">I HAVE READ AND FULLY UNDERSTAND THE PROGRAM DETAILS IN THE SIDEBAR, AND THE WAIVER AND RELEASE OF ALL CLAIMS FOR PARTICIPATION IN TRACKERS EARTH, INC, dba TRACKERSNW PROGRAMS ABOVE.  I ACKNOWLEDGE THAT, BY TYPING MY NAME BELOW AND CLICKING &quot;APPLY SIGNATURE,&quot; I AM PROVIDING AN ELECTRONIC SIGNATURE TO THE ABOVE WAIVER AND RELEASE, WHICH CONFIRMS MY INTENT TO BE BOUND BY ITS TERMS.</p>
                        <table width="595" height="35" border="0" cellpadding="5" cellspacing="0" bgcolor="#DCEEC5">
                          <tr>
                            <td width="595"><p class="waiver">  
                          <input name="lconsent" type="text" id="lconsent" size="30" maxlength="30" />
                            Signature of adult Applicant/				Signature of minor child Applicant/ Participant OR parent/guardian of			Participant (if applicable) </p>
		<p class="waiver"> <strong><em>Type your name where indicated above then click the &quot;Apply Signature&quot; icon</em></strong><br />
                </p></td>
                          </tr>
                          <tr>
                            <td><div align="left">
                              <input type="submit" name="Submit" value="Apply Signature" />
                            </div></td>
                          </tr>
              </table>
		<div align="left"><br>
		</div>
        </form>

</div>