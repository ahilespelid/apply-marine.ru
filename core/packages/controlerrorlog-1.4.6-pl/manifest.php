<?php return array (
  'manifest-version' => '1.1',
  'manifest-attributes' => 
  array (
    'changelog' => 'Changelog for controlErrorLog.

1.4.6-pl
==============
- Fixed a bug with the incorrect Smarty compilation path (#31).

1.4.5-pl
==============
- Fixed a bug with updating the ControlErrorlog icon.
- Fixed parsing for fatal errors.

1.4.4-pl
==============
- Removed the definition of the compilation path for Smarty.

1.4.3-pl
==============
- Fixed hashing of missing log file.
- Optimized for MODX 3.

1.4.2-pl
==============
- Added check for user menu existence (#27).

1.4.1-beta
==============
- Added system setting "enable" to manage controlErrorLog in the backend.
- Fixed a bug with the too large mode.
- Return back PHP5 support.

1.4.0-beta
==============
- Added the ability to format the error log content.
- Changed the "control_frontend" system setting behavior. Now it\'s responsible for displaying the error log on the frontend (useful in development mode).

1.3.1-pl
==============
- Added closing the window by clicking on the icon.

1.3.0-pl
==============
- Added the ability to control copies of the error log.

1.2.1-pl
==============
- Moved "Make a copy" button to the left (PR #16).

1.2.0-pl
==============
- Added a button "Make a copy" which makes a copy of the error log with current timestamp in the name.
- Changed the admin notification event from "OnHandleRequest" to "OnWebPageComplete".

1.1.3-pl
==============
- Fixed a bug which occurs when the error log is bigger then allowed memory size (#14).

1.1.2-pl
==============
- Code optimization.
- Added cron script for checking the error log (core/components/controlerrorlog/cron/checkerrorlog.php).

1.1.1-pl
==============
- Updated the Dutch lexicon.

1.1.0-pl
==============
- Added control of the error log in the frontend of the site and admin notification.

1.0.5-pl
==============
- Fixed bug with lexicon strings with some CMPs (#6)

1.0.4-pl
==============
- Fixed the error #5.

1.0.3-pl
==============
- Now the error log is checked for errors every minute (by default). It can be switched off.
- Add a system setting "Last lines".
- Add a system setting "Refresh frequency".
- Add a system setting "Auto refresh".
- Some improvements - now the window closes with animation, refreshing the error log on opening the window.

1.0.2-pl
==============
- Removed the table creation script.

1.0.1-pl
==============
- Changed the appearance of the error indicator.
- Now the error indicator is displayed only for users with permission "error_log_view".
- Removed Error Log button.
- Added language support for Dutch.

1.0.0-pl
==============
- Initial release',
    'license' => 'GNU GENERAL PUBLIC LICENSE
   Version 2, June 1991
--------------------------

Copyright (C) 1989, 1991 Free Software Foundation, Inc.
59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

Everyone is permitted to copy and distribute verbatim copies
of this license document, but changing it is not allowed.

Preamble
--------

  The licenses for most software are designed to take away your
freedom to share and change it.  By contrast, the GNU General Public
License is intended to guarantee your freedom to share and change free
software--to make sure the software is free for all its users.  This
General Public License applies to most of the Free Software
Foundation\'s software and to any other program whose authors commit to
using it.  (Some other Free Software Foundation software is covered by
the GNU Library General Public License instead.)  You can apply it to
your programs, too.

  When we speak of free software, we are referring to freedom, not
price.  Our General Public Licenses are designed to make sure that you
have the freedom to distribute copies of free software (and charge for
this service if you wish), that you receive source code or can get it
if you want it, that you can change the software or use pieces of it
in new free programs; and that you know you can do these things.

  To protect your rights, we need to make restrictions that forbid
anyone to deny you these rights or to ask you to surrender the rights.
These restrictions translate to certain responsibilities for you if you
distribute copies of the software, or if you modify it.

  For example, if you distribute copies of such a program, whether
gratis or for a fee, you must give the recipients all the rights that
you have.  You must make sure that they, too, receive or can get the
source code.  And you must show them these terms so they know their
rights.

  We protect your rights with two steps: (1) copyright the software, and
(2) offer you this license which gives you legal permission to copy,
distribute and/or modify the software.

  Also, for each author\'s protection and ours, we want to make certain
that everyone understands that there is no warranty for this free
software.  If the software is modified by someone else and passed on, we
want its recipients to know that what they have is not the original, so
that any problems introduced by others will not reflect on the original
authors\' reputations.

  Finally, any free program is threatened constantly by software
patents.  We wish to avoid the danger that redistributors of a free
program will individually obtain patent licenses, in effect making the
program proprietary.  To prevent this, we have made it clear that any
patent must be licensed for everyone\'s free use or not licensed at all.

  The precise terms and conditions for copying, distribution and
modification follow.


GNU GENERAL PUBLIC LICENSE
TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION
---------------------------------------------------------------

  0. This License applies to any program or other work which contains
a notice placed by the copyright holder saying it may be distributed
under the terms of this General Public License.  The "Program", below,
refers to any such program or work, and a "work based on the Program"
means either the Program or any derivative work under copyright law:
that is to say, a work containing the Program or a portion of it,
either verbatim or with modifications and/or translated into another
language.  (Hereinafter, translation is included without limitation in
the term "modification".)  Each licensee is addressed as "you".

Activities other than copying, distribution and modification are not
covered by this License; they are outside its scope.  The act of
running the Program is not restricted, and the output from the Program
is covered only if its contents constitute a work based on the
Program (independent of having been made by running the Program).
Whether that is true depends on what the Program does.

  1. You may copy and distribute verbatim copies of the Program\'s
source code as you receive it, in any medium, provided that you
conspicuously and appropriately publish on each copy an appropriate
copyright notice and disclaimer of warranty; keep intact all the
notices that refer to this License and to the absence of any warranty;
and give any other recipients of the Program a copy of this License
along with the Program.

You may charge a fee for the physical act of transferring a copy, and
you may at your option offer warranty protection in exchange for a fee.

  2. You may modify your copy or copies of the Program or any portion
of it, thus forming a work based on the Program, and copy and
distribute such modifications or work under the terms of Section 1
above, provided that you also meet all of these conditions:

    a) You must cause the modified files to carry prominent notices
    stating that you changed the files and the date of any change.

    b) You must cause any work that you distribute or publish, that in
    whole or in part contains or is derived from the Program or any
    part thereof, to be licensed as a whole at no charge to all third
    parties under the terms of this License.

    c) If the modified program normally reads commands interactively
    when run, you must cause it, when started running for such
    interactive use in the most ordinary way, to print or display an
    announcement including an appropriate copyright notice and a
    notice that there is no warranty (or else, saying that you provide
    a warranty) and that users may redistribute the program under
    these conditions, and telling the user how to view a copy of this
    License.  (Exception: if the Program itself is interactive but
    does not normally print such an announcement, your work based on
    the Program is not required to print an announcement.)

These requirements apply to the modified work as a whole.  If
identifiable sections of that work are not derived from the Program,
and can be reasonably considered independent and separate works in
themselves, then this License, and its terms, do not apply to those
sections when you distribute them as separate works.  But when you
distribute the same sections as part of a whole which is a work based
on the Program, the distribution of the whole must be on the terms of
this License, whose permissions for other licensees extend to the
entire whole, and thus to each and every part regardless of who wrote it.

Thus, it is not the intent of this section to claim rights or contest
your rights to work written entirely by you; rather, the intent is to
exercise the right to control the distribution of derivative or
collective works based on the Program.

In addition, mere aggregation of another work not based on the Program
with the Program (or with a work based on the Program) on a volume of
a storage or distribution medium does not bring the other work under
the scope of this License.

  3. You may copy and distribute the Program (or a work based on it,
under Section 2) in object code or executable form under the terms of
Sections 1 and 2 above provided that you also do one of the following:

    a) Accompany it with the complete corresponding machine-readable
    source code, which must be distributed under the terms of Sections
    1 and 2 above on a medium customarily used for software interchange; or,

    b) Accompany it with a written offer, valid for at least three
    years, to give any third party, for a charge no more than your
    cost of physically performing source distribution, a complete
    machine-readable copy of the corresponding source code, to be
    distributed under the terms of Sections 1 and 2 above on a medium
    customarily used for software interchange; or,

    c) Accompany it with the information you received as to the offer
    to distribute corresponding source code.  (This alternative is
    allowed only for noncommercial distribution and only if you
    received the program in object code or executable form with such
    an offer, in accord with Subsection b above.)

The source code for a work means the preferred form of the work for
making modifications to it.  For an executable work, complete source
code means all the source code for all modules it contains, plus any
associated interface definition files, plus the scripts used to
control compilation and installation of the executable.  However, as a
special exception, the source code distributed need not include
anything that is normally distributed (in either source or binary
form) with the major components (compiler, kernel, and so on) of the
operating system on which the executable runs, unless that component
itself accompanies the executable.

If distribution of executable or object code is made by offering
access to copy from a designated place, then offering equivalent
access to copy the source code from the same place counts as
distribution of the source code, even though third parties are not
compelled to copy the source along with the object code.

  4. You may not copy, modify, sublicense, or distribute the Program
except as expressly provided under this License.  Any attempt
otherwise to copy, modify, sublicense or distribute the Program is
void, and will automatically terminate your rights under this License.
However, parties who have received copies, or rights, from you under
this License will not have their licenses terminated so long as such
parties remain in full compliance.

  5. You are not required to accept this License, since you have not
signed it.  However, nothing else grants you permission to modify or
distribute the Program or its derivative works.  These actions are
prohibited by law if you do not accept this License.  Therefore, by
modifying or distributing the Program (or any work based on the
Program), you indicate your acceptance of this License to do so, and
all its terms and conditions for copying, distributing or modifying
the Program or works based on it.

  6. Each time you redistribute the Program (or any work based on the
Program), the recipient automatically receives a license from the
original licensor to copy, distribute or modify the Program subject to
these terms and conditions.  You may not impose any further
restrictions on the recipients\' exercise of the rights granted herein.
You are not responsible for enforcing compliance by third parties to
this License.

  7. If, as a consequence of a court judgment or allegation of patent
infringement or for any other reason (not limited to patent issues),
conditions are imposed on you (whether by court order, agreement or
otherwise) that contradict the conditions of this License, they do not
excuse you from the conditions of this License.  If you cannot
distribute so as to satisfy simultaneously your obligations under this
License and any other pertinent obligations, then as a consequence you
may not distribute the Program at all.  For example, if a patent
license would not permit royalty-free redistribution of the Program by
all those who receive copies directly or indirectly through you, then
the only way you could satisfy both it and this License would be to
refrain entirely from distribution of the Program.

If any portion of this section is held invalid or unenforceable under
any particular circumstance, the balance of the section is intended to
apply and the section as a whole is intended to apply in other
circumstances.

It is not the purpose of this section to induce you to infringe any
patents or other property right claims or to contest validity of any
such claims; this section has the sole purpose of protecting the
integrity of the free software distribution system, which is
implemented by public license practices.  Many people have made
generous contributions to the wide range of software distributed
through that system in reliance on consistent application of that
system; it is up to the author/donor to decide if he or she is willing
to distribute software through any other system and a licensee cannot
impose that choice.

This section is intended to make thoroughly clear what is believed to
be a consequence of the rest of this License.

  8. If the distribution and/or use of the Program is restricted in
certain countries either by patents or by copyrighted interfaces, the
original copyright holder who places the Program under this License
may add an explicit geographical distribution limitation excluding
those countries, so that distribution is permitted only in or among
countries not thus excluded.  In such case, this License incorporates
the limitation as if written in the body of this License.

  9. The Free Software Foundation may publish revised and/or new versions
of the General Public License from time to time.  Such new versions will
be similar in spirit to the present version, but may differ in detail to
address new problems or concerns.

Each version is given a distinguishing version number.  If the Program
specifies a version number of this License which applies to it and "any
later version", you have the option of following the terms and conditions
either of that version or of any later version published by the Free
Software Foundation.  If the Program does not specify a version number of
this License, you may choose any version ever published by the Free Software
Foundation.

  10. If you wish to incorporate parts of the Program into other free
programs whose distribution conditions are different, write to the author
to ask for permission.  For software which is copyrighted by the Free
Software Foundation, write to the Free Software Foundation; we sometimes
make exceptions for this.  Our decision will be guided by the two goals
of preserving the free status of all derivatives of our free software and
of promoting the sharing and reuse of software generally.

NO WARRANTY
-----------

  11. BECAUSE THE PROGRAM IS LICENSED FREE OF CHARGE, THERE IS NO WARRANTY
FOR THE PROGRAM, TO THE EXTENT PERMITTED BY APPLICABLE LAW.  EXCEPT WHEN
OTHERWISE STATED IN WRITING THE COPYRIGHT HOLDERS AND/OR OTHER PARTIES
PROVIDE THE PROGRAM "AS IS" WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED
OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE.  THE ENTIRE RISK AS
TO THE QUALITY AND PERFORMANCE OF THE PROGRAM IS WITH YOU.  SHOULD THE
PROGRAM PROVE DEFECTIVE, YOU ASSUME THE COST OF ALL NECESSARY SERVICING,
REPAIR OR CORRECTION.

  12. IN NO EVENT UNLESS REQUIRED BY APPLICABLE LAW OR AGREED TO IN WRITING
WILL ANY COPYRIGHT HOLDER, OR ANY OTHER PARTY WHO MAY MODIFY AND/OR
REDISTRIBUTE THE PROGRAM AS PERMITTED ABOVE, BE LIABLE TO YOU FOR DAMAGES,
INCLUDING ANY GENERAL, SPECIAL, INCIDENTAL OR CONSEQUENTIAL DAMAGES ARISING
OUT OF THE USE OR INABILITY TO USE THE PROGRAM (INCLUDING BUT NOT LIMITED
TO LOSS OF DATA OR DATA BEING RENDERED INACCURATE OR LOSSES SUSTAINED BY
YOU OR THIRD PARTIES OR A FAILURE OF THE PROGRAM TO OPERATE WITH ANY OTHER
PROGRAMS), EVEN IF SUCH HOLDER OR OTHER PARTY HAS BEEN ADVISED OF THE
POSSIBILITY OF SUCH DAMAGES.

---------------------------
END OF TERMS AND CONDITIONS',
    'readme' => '--------------------
controlErrorLog
--------------------
Author: Sergey Shlokov <sergant210@bk.ru>
--------------------

This Extra adds a new feature to manager interface - the ability to control the error log and view it in a popup window.

Feel free to suggest ideas/improvements/bugs on GitHub:
http://github.com/sergant210/controlErrorLog/issues',
    'chunks' => 
    array (
      'errorLogPanel.tpl' => '<div id="side-panel-wrapper">
	<ul class="side-buttons">
		<li class="side-buttons-item"><span id="side-button-open" class="celicon-check-circle"><i class="celicon"></i></span></li>
		<li class="side-buttons-item"><span id="side-button-refresh" class="celicon-refresh"><i class="celicon"></i></span></li>
		<li class="side-buttons-item"><span id="side-button-clear" class="celicon-trash disabled"><i class="celicon"></i></span></li>
	</ul>
	<div class="side-panel">
		<div class="side-panel-header">
			<span>[[%error_log]]</span>
			<span id="side-panel-close-button">&times;</span>
		</div>
		<div class="side-panel-body"></div>
		<div class="side-panel-footer" data-records="[[%errorlog_total_messages]]"> </div>
	</div>
</div>',
    ),
    'setup-options' => 'controlerrorlog-1.4.6-pl/setup-options.php',
  ),
  'manifest-vehicles' => 
  array (
    0 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modNamespace',
      'guid' => '1cff2e88771d38f67e0653662da396a5',
      'native_key' => 'controlerrorlog',
      'filename' => 'modNamespace/8746d108e5c9041aac4b574a447fa47e.vehicle',
      'namespace' => 'controlerrorlog',
    ),
    1 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '590688825fdf0c2409f8ab95a226d7ac',
      'native_key' => 'controlerrorlog.last_lines',
      'filename' => 'modSystemSetting/f9440f643cf6f274ae1c2ed89515212b.vehicle',
      'namespace' => 'controlerrorlog',
    ),
    2 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '55018fd9144a458243a17f9dc67195a6',
      'native_key' => 'controlerrorlog.refresh_freq',
      'filename' => 'modSystemSetting/5e17256cdd2ce9f0d6ba14da5179fda8.vehicle',
      'namespace' => 'controlerrorlog',
    ),
    3 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '452028d73da0a56e364ef28459c4ea54',
      'native_key' => 'controlerrorlog.auto_refresh',
      'filename' => 'modSystemSetting/345388c769421dcb448c5808d869cc68.vehicle',
      'namespace' => 'controlerrorlog',
    ),
    4 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '212479e6997c5c941873c3b1ed022c13',
      'native_key' => 'controlerrorlog.control_frontend',
      'filename' => 'modSystemSetting/6d00a578f07c926aee56a5a391b4b07f.vehicle',
      'namespace' => 'controlerrorlog',
    ),
    5 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '2ced6b9466f9449757778c79fbd1af0d',
      'native_key' => 'controlerrorlog.admin_email',
      'filename' => 'modSystemSetting/27ea6a7e345afea6bbb59aa4674bf8e9.vehicle',
      'namespace' => 'controlerrorlog',
    ),
    6 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'c49a9caed19890e58a2374db36d8fc2e',
      'native_key' => 'controlerrorlog.allow_copy_deletion',
      'filename' => 'modSystemSetting/4bc891f2dc3f71a0053d04d858489373.vehicle',
      'namespace' => 'controlerrorlog',
    ),
    7 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'c4fc571d0f053c8fee62941be2476322',
      'native_key' => 'controlerrorlog.tpl',
      'filename' => 'modSystemSetting/3549cf3fe8c6567f9ea5e5d29272974b.vehicle',
      'namespace' => 'controlerrorlog',
    ),
    8 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '90abafd478cc0a0cb18ea858ac8d869c',
      'native_key' => 'controlerrorlog.format_output',
      'filename' => 'modSystemSetting/a33c119bf91029e37d8a0e1708961e07.vehicle',
      'namespace' => 'controlerrorlog',
    ),
    9 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '4f5eb755fd10e7df261937b14062c751',
      'native_key' => 'controlerrorlog.date_format',
      'filename' => 'modSystemSetting/94917ec353eccb906b3ace5273f73301.vehicle',
      'namespace' => 'controlerrorlog',
    ),
    10 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '3990528ff3ddaedcae9359e1176fe942',
      'native_key' => 'controlerrorlog.css_file',
      'filename' => 'modSystemSetting/cb1a5bb8e26c213cb7e119f994dd742a.vehicle',
      'namespace' => 'controlerrorlog',
    ),
    11 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '1756e8bd67eab8644583a1463a12da95',
      'native_key' => 'controlerrorlog.js_file',
      'filename' => 'modSystemSetting/04ab3a2a3187210608e36b0a3a77654c.vehicle',
      'namespace' => 'controlerrorlog',
    ),
    12 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '12cddc44815f8806cbe94973c0943086',
      'native_key' => 'controlerrorlog.enable',
      'filename' => 'modSystemSetting/ea23e923ba37d974510474064b11e8dd.vehicle',
      'namespace' => 'controlerrorlog',
    ),
    13 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modCategory',
      'guid' => '42752439d7856e003cf68c76e752e2b9',
      'native_key' => NULL,
      'filename' => 'modCategory/5aff76b968590ce50f10a4638a1d88e7.vehicle',
      'namespace' => 'controlerrorlog',
    ),
  ),
);