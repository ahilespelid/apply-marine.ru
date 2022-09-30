<?php return array (
  'manifest-version' => '1.1',
  'manifest-attributes' => 
  array (
    'changelog' => 'Changelog for PayAndSee.

2.0.24-beta (16.09.2019)
==============
- Change "getPls" [PasSubscription]

2.0.23-beta (12.08.2019)
==============
- Fix "getCost" [PasOrderHandler]

2.0.22-beta (29.03.2019)
==============
- Fix "pas.content" snippet

2.0.21-beta (02.03.2019)
==============
- Fix "loadCustomClasses" [PayAndSee]
- Add "getFreshenFields" [UserEventsOrderHandler]

2.0.20-beta (17.01.2019)
==============
- Add "PasOnSubscriptionBeforeRemove,PasOnSubscriptionRemove" event

2.0.19-beta (12.12.2018)
==============
- Change "payandsee-grid-subscription", "payandsee-grid-client" [js]

2.0.18-beta (06.12.2018)
==============
- Improved support of MODX 2.7

2.0.17-beta (21.11.2018)
==============
- Fix "modUserGetListProcessor" processor
- Improved "payandsee-combo-user", "payandsee-combo-client"

2.0.16-beta (03.07.2018)
==============
- Add "formatNumber" [PayAndSee]

2.0.14-2.0.15-beta (02.07.2018)
==============
- Add "number_format" setting
- Add "msPromoCode" compatibility [PasOrderHandler]
- Change "formatPrice" [PayAndSee]
- Change "pas.order" chunk
- Change "payandsee.Order.add" [js]

2.0.13-beta (17.04.2018)
==============
- Add "msDiscount" compatibility [PasOrderHandler]

2.0.12-beta (23.02.2018)
==============
- Add "checkStat" [PayAndSee]
- Change "Order.submit" [js]

2.0.11-beta (19.12.2017)
==============
- Change "getColumns" [payandsee.grid.Client]

2.0.9-beta (02.10.2017)
==============
- Remove "templates" transport

2.0.8-beta (21.09.2017)
==============
- Change "processEvent,changeSubscription,changeStatus" [PayAndSee]

2.0.7-beta (14.09.2017)
==============
- Change "initialize" [PayAndSee]

2.0.6-beta (10.09.2017)
==============
- Add "setUserCultureKey,getUserCultureKey" [PasClient]
- Improved "changeStatus" [PayAndSee]

2.0.5-beta (08.09.2017)
==============
- Fix "deliveries" [resolver]

2.0.2-beta - 2.0.4-beta (08.09.2017)
==============
- Add "getClientLang" [PasClient]
- Improved "getUserId" [PayAndSee]
- Improved "changeStatus" [PayAndSee]

2.0.1-beta (07.09.2017)
==============
- Fix model
- Add "cron" scripts

2.0.0-beta (29.08.2017)
==============
- Initial',
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
PayAndSee
--------------------
Author: Vgrish <vgrish@gmail.com>
--------------------
',
    'chunks' => 
    array (
      'pas.content' => '<div class="pas-content row">
    <form method="get" action="{$action}" class="quickview"
          data-formsubmit
          data-data-action="snippet"
          data-data-element="!pas.order"
          data-data-id="{$content_resource}"
          data-quickview-sethash="true"
          data-hash-content="{$content_id}"
          data-dialog-title=""
          data-dialog-size="size-wide"
    >
        <input type="hidden" name="content" value="{$content_id}">

        <div class="col-md-12">
            <h4><a href="{$id | url}">{$content_name}</a></h4>
            {if $content_description}
                <p>
                    <small>{$content_description}</small>
                </p>
            {/if}
        </div>

        <div class="col-md-6 form-group">
            <div class="row">
                {\'pas.rate\'|chunk:[\'rates\'=>$rates]}
            </div>
        </div>

        <div class="col-md-6 form-group">
            <div class="row">
                <div class="col-md-3 form-group">
                    <button class="btn btn-default btn-block" type="submit">
                        <i class="glyphicon glyphicon-barcode"></i> {\'payandsee_action_buy\' | lexicon}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>


',
      'pas.rate' => '{if count($rates)}
    <label for="rate" class="form-control-static control-label col-md-4">
        {\'payandsee_term\' | lexicon}:
    </label>
    <div class="form-group col-md-8">
        <select name="rate" class="form-control">
            {foreach $rates as $row}
                {set $checked = $row.id == $.request.rate || !$.request.rate && $row.id == $order.rate}

                <option value="{$row.id}" id="rate_{$row.id}" title="{$row.description}" {$checked ? \'selected\' : \'\'}>
                    {$row.term_value} - {$row.term_value | decl : ((\'payandsee_decl_date_\' ~ $row.term_unit) | lexicon)}
                    {$row.cost} {\'payandsee_unit_cost\' | lexicon}
                </option>
            {/foreach}
        </select>
    </div>
{/if}
',
      'pas.order' => '<div class="pas-order row">
    <form method="post" class="pas-form">
        <input type="hidden" name="content" id="content_{$content_id}" value="{$content_id}">
        <input type="hidden" name="delivery" id="delivery_{$form.delivery}" value="{$form.delivery}">

        <div class="col-md-12">
            <h4><a href="{$id | url}">{$content_name}</a></h4>
            {if $content_description}
                <p>
                    <small>{$content_description}</small>
                </p>
            {/if}
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 form-group">
                    <div class="row">
                        {\'pas.rate\'|chunk:[\'rates\'=>$rates,\'order\'=>$order]}
                    </div>

                    <div class="row input-parent">
                        <label class="form-control-static control-label col-md-4">
                            {\'payandsee_payment\' | lexicon}:
                        </label>
                        <div class="form-group col-md-8">
                            <select name="payment" class="form-control">
                                {foreach $payments as $row}
                                    {set $checked = $row.id == $order.payment ? \'checked\' : \'\'}
                                    <option value="{$row.id}" id="payment_{$row.id}"
                                            title="{$row.description}" {$checked ? \'selected\' : \'\'}>
                                        {$row.name}
                                    </option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 form-group">
                    {foreach [\'email\',\'phone\'] as $field}
                        <div class="row input-parent">
                            <label class="form-control-static control-label col-md-4" for="{$field}">
                                {(\'payandsee_\' ~ $field) | lexicon}<span class="required-star">*</span>:
                            </label>
                            <div class="form-group col-md-8">
                                <input type="text" id="{$field}"
                                       placeholder="{(\'payandsee_\' ~ $field) | lexicon}"
                                       name="{$field}" value="{$form[$field]}"
                                       class="form-control{($field in list $errors) ? \' error\' : \'\'}">
                            </div>
                        </div>
                    {/foreach}

                    <!-- add "msDiscount"-->
                    {if 0}
                        {set $field = \'coupon_code\'}
                        <div class="row input-parent">
                            <label class="form-control-static control-label col-md-4" for="{$field}">
                                {(\'payandsee_\' ~ $field) | lexicon}:
                            </label>
                            <div class="form-group col-md-8">
                                <input type="text" id="{$field}"
                                       placeholder="XXXXX-XXXX-XXXX-XXXX"
                                       name="{$field}" value="{$order[$field]}"
                                       class="form-control{($field in list $errors) ? \' error\' : \'\'}">
                            </div>
                        </div>
                    {/if}

                    <!-- add "msPromoCode"-->
                    {if 0}
                        {set $field = \'mspromo_code\'}
                        <div class="row input-parent">
                            <label class="form-control-static control-label col-md-4" for="{$field}">
                                {(\'payandsee_\' ~ $field) | lexicon}:
                            </label>
                            <div class="form-group col-md-8">
                                <input type="text" id="{$field}"
                                       placeholder="XXXXX-XXXX-XXXX"
                                       name="{$field}" value="{$order[$field]}"
                                       class="form-control{($field in list $errors) ? \' error\' : \'\'}">
                            </div>
                        </div>
                    {/if}


                    {set $field = \'comment\'}
                    <div class="row input-parent">
                        <label class="form-control-static control-label col-md-4" for="{$field}">
                            {(\'payandsee_\' ~ $field) | lexicon}:
                        </label>
                        <div class="form-group col-md-8">
                            <textarea name="{$field}" id="{$field}" placeholder="{(\'payandsee_\' ~ $field) | lexicon}"
                                      class="form-control{($field in list $errors) ? \' error\' : \'\'}">{$form[$field]}</textarea>
                        </div>
                    </div>

                    {set $field = \'agree\'}
                    <div class="row input-parent">
                        <label class="form-control-static control-label col-md-4" for="{$field}">
                            {(\'payandsee_\' ~ $field) | lexicon}<span class="required-star">*</span>:
                        </label>
                        <div class="form-group col-md-8">
                            <input type="checkbox" name="{$field}" value="1" id="{$field}">
                            {(\'payandsee_order_\' ~ $field) | lexicon}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-12">
            <div class="well">
                <h3>{\'payandsee_order_cost\' | lexicon}:
                    <span id="pas-order-cost">{$order.cost ?: 0}</span>
                    {\'payandsee_unit_cost\' | lexicon}
                </h3>
                <button type="submit" name="pasaction" value="order/submit"
                        class="btn btn-default btn-primary pas_link">
                    {\'payandsee_order_submit\' | lexicon}
                </button>
            </div>
        </div>

    </form>
</div>

',
      'pas.get.order' => '<div class="pas-order">
    <div class="table-responsive">
        <table class="table table-striped">
            <tr class="header">
                <th class="name col-md-4">{\'payandsee_content\' | lexicon}</th>
                <th class="options col-md-2">{\'payandsee_term\' | lexicon}</th>
                <th class="cost col-md-1">{\'payandsee_cost\' | lexicon}</th>
            </tr>
            {foreach $products as $row}
                <tr>
                    <td class="name">
                        <h4><a href="{$row.content_resource | url}">{$row.content_name}</a></h4>
                        {if $row.content_description}
                            <p>
                                <small>{$row.content_description}</small>
                            </p>
                        {/if}
                    </td>
                    <td class="options">
                        {if $row.term_value?}
                            <div class="small">
                                {$row.term_value} - {$row.term_value | decl : ((\'payandsee_decl_date_\' ~ $row.term_unit) | lexicon)}
                            </div>
                        {/if}
                    </td>
                    <td class="cost">
                        {$row.cost} {\'payandsee_unit_cost\' | lexicon}
                    </td>
                </tr>
            {/foreach}
            <tr class="footer">
                <th class="">
                    {\'payandsee_order_cost\' | lexicon}:
                    {if $total.delivery_cost}
                        {$total.cart_cost} {\'payandsee_unit_cost\' | lexicon} + {$total.delivery_cost}
                        {\'payandsee_unit_cost\' | lexicon} =
                    {/if}
                    <strong>{$total.cost}</strong> {\'payandsee_unit_cost\' | lexicon}
                </th>
                <th class="">
                </th>
                <th class="">
                </th>
            </tr>
        </table>
    </div>
</div>',
      'pas.subscription' => '<div class="pas-subscription row">
    <div class="col-md-12">
        <div class="col-md-3 col-sm-3 col-xs-6">
            {\'payandsee_client\'|lexicon}:
            <p><strong>{$user_username}</strong> <sub>{$profile_email}</sub></p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
            <a href="{$content_resource|url:[\'scheme\'=>\'full\']}">{$content_name}</a>
            {if $content_description}
                <p>
                    <small>{$content_description}</small>
                </p>
            {/if}
        </div>
        <div class="col-md-2 col-sm-2 col-xs-6">
            {\'payandsee_startdate\'|lexicon}:
            <p>
                <small>{$startdate | date :"d.m.Y H:i"} </small>
            </p>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-6">
            {\'payandsee_stopdate\'|lexicon}:
            <p>
                <small>{$stopdate | date :"d.m.Y H:i"} </small>
            </p>
        </div>
        <div class="col-md-2 col-sm-2 hidden-xs">
            {\'payandsee_status\'|lexicon}:
            <p style="color: #{$status_color}">
                <small>{$status_name} </small>
            </p>
        </div>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
</div>
',
    ),
  ),
  'manifest-vehicles' => 
  array (
    0 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modNamespace',
      'guid' => '814f3217bb253cc1ebc932a5493cbc69',
      'native_key' => 'payandsee',
      'filename' => 'modNamespace/479e719ca4c119d1da7d06c6647d60e4.vehicle',
      'namespace' => 'payandsee',
    ),
    1 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOFileVehicle',
      'class' => 'xPDOFileVehicle',
      'guid' => '0772db26ea510610e13d35d1aab425a9',
      'native_key' => '0772db26ea510610e13d35d1aab425a9',
      'filename' => 'xPDOFileVehicle/4cd64c182c2d16b1e1e4a152f2f4cd5d.vehicle',
    ),
    2 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'a4669e38234829ef0aaf5b2e46d88672',
      'native_key' => 'payandsee_working_templates',
      'filename' => 'modSystemSetting/298eaeb28518a6441d811cc110a77eee.vehicle',
      'namespace' => 'payandsee',
    ),
    3 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '8b7188560c9e9ae4a713dfb25f585826',
      'native_key' => 'payandsee_client_groups',
      'filename' => 'modSystemSetting/e0a136dcab256812def625142fcd97cb.vehicle',
      'namespace' => 'payandsee',
    ),
    4 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '4ec3d9c6791ffb4150ef2a2541dcf01e',
      'native_key' => 'payandsee_email_manager',
      'filename' => 'modSystemSetting/7a6d7cca341458ec025e4d7889da858d.vehicle',
      'namespace' => 'payandsee',
    ),
    5 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '07465f6a90016dd4b9e43215cf97eaaf',
      'native_key' => 'payandsee_front_css',
      'filename' => 'modSystemSetting/0e36868d0b05e4022aaecff40e1c51ed.vehicle',
      'namespace' => 'payandsee',
    ),
    6 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'f7ea3738d63339c4344797e43497d573',
      'native_key' => 'payandsee_front_js',
      'filename' => 'modSystemSetting/daed2e342d7277ef725e46bfc86c8163.vehicle',
      'namespace' => 'payandsee',
    ),
    7 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '8420f250f16b51735e5b210b0f7614e9',
      'native_key' => 'payandsee_number_format',
      'filename' => 'modSystemSetting/7d291586a63e35210a028739f31d3ab3.vehicle',
      'namespace' => 'payandsee',
    ),
    8 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'd34e7445a70238a94c5e2768c8dab3fc',
      'native_key' => 'payandsee_order_handler_class',
      'filename' => 'modSystemSetting/b297996983ab36620bd74e0b911a5de3.vehicle',
      'namespace' => 'payandsee',
    ),
    9 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '4f3f3a4f784762eb324ff462f90f24c4',
      'native_key' => 'payandsee_order_delivery_id',
      'filename' => 'modSystemSetting/17499863650793a1a9fedcbcf5ae7b73.vehicle',
      'namespace' => 'payandsee',
    ),
    10 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'c7a01b72486607581229d2957d000484',
      'native_key' => 'payandsee_order_resource_id',
      'filename' => 'modSystemSetting/efefbe5d6d4a3f2dcaa93ab2080a7043.vehicle',
      'namespace' => 'payandsee',
    ),
    11 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '124468041a59088f11ac985e204d9c62',
      'native_key' => 'PasOnBeforeChangeStatus',
      'filename' => 'modEvent/8fce4750045d70186a2039dc6f3e9edd.vehicle',
      'namespace' => 'payandsee',
    ),
    12 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'f4d96f7dff287d61280c504828758770',
      'native_key' => 'PasOnChangeStatus',
      'filename' => 'modEvent/c3ae43b72be84d46a7903ac725f30b65.vehicle',
      'namespace' => 'payandsee',
    ),
    13 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'e7a1ad0c67011d5a305d19e19140d7bd',
      'native_key' => 'PasOnBeforeChangeTerm',
      'filename' => 'modEvent/277501786a56cde2366746c467f2450b.vehicle',
      'namespace' => 'payandsee',
    ),
    14 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'fd9d3023403ffcfe99c92a42437c7d70',
      'native_key' => 'PasOnChangeTerm',
      'filename' => 'modEvent/3c43dfd2fba82d3b70e0e363d1c0d35b.vehicle',
      'namespace' => 'payandsee',
    ),
    15 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'd83f4bbe622265a01eafe18b28e454b6',
      'native_key' => 'PasOnClientBeforeSave',
      'filename' => 'modEvent/d9f5203f6d8faca84c5252c45bac9a1a.vehicle',
      'namespace' => 'payandsee',
    ),
    16 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '584eae1a6cee5a349c9fe264ff3c2b41',
      'native_key' => 'PasOnClientSave',
      'filename' => 'modEvent/135a0d895978026b2ac43c67057b3953.vehicle',
      'namespace' => 'payandsee',
    ),
    17 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'ca480761a5b4e9bb23239c47e405be58',
      'native_key' => 'PasOnSubscriptionBeforeSave',
      'filename' => 'modEvent/71b38ba809eb79c1cf48bd73255e3de7.vehicle',
      'namespace' => 'payandsee',
    ),
    18 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'de1c9e8593545c7f7483b10d33a5dc7f',
      'native_key' => 'PasOnSubscriptionSave',
      'filename' => 'modEvent/64aeae5e395ec1522e6d9eb433aee0c5.vehicle',
      'namespace' => 'payandsee',
    ),
    19 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '2b7167311787aab04a422188a5dfb400',
      'native_key' => 'PasOnSubscriptionBeforeRemove',
      'filename' => 'modEvent/aa8d10b78b12740b2e8ce97bdb60c47a.vehicle',
      'namespace' => 'payandsee',
    ),
    20 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '863429e1c58410d5e254bc1e5dc57519',
      'native_key' => 'PasOnSubscriptionRemove',
      'filename' => 'modEvent/408038c74d71943db83471372299ec42.vehicle',
      'namespace' => 'payandsee',
    ),
    21 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'ea5707409ff4a9589bb7a50f9c8a1c5d',
      'native_key' => 'PasOnRateBeforeSave',
      'filename' => 'modEvent/eebb5564949fc17523c5d796ced8c07d.vehicle',
      'namespace' => 'payandsee',
    ),
    22 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '4ffe6e8ac316adb4adeaa6309dff2bba',
      'native_key' => 'PasOnRateSave',
      'filename' => 'modEvent/9b8fa009fb4a0e7163cbe278f27f9ce3.vehicle',
      'namespace' => 'payandsee',
    ),
    23 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '65c28a9f28ed67ebc245ee81e8ed153d',
      'native_key' => 'PasOnGetRateCost',
      'filename' => 'modEvent/635f858c2faee1ee31ae890c876eee4a.vehicle',
      'namespace' => 'payandsee',
    ),
    24 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '13c9f1b6feb1a51297a328c8900b1e3f',
      'native_key' => 'PasOnContentBeforeSave',
      'filename' => 'modEvent/b3e33e944f8d2575cfc9219d9ac28c9d.vehicle',
      'namespace' => 'payandsee',
    ),
    25 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '5c04ac040595baa2a9254c6a7b2b3772',
      'native_key' => 'PasOnContentSave',
      'filename' => 'modEvent/299dd334ec14538564ba2e812ae73adf.vehicle',
      'namespace' => 'payandsee',
    ),
    26 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '91894d95370bddba4a5d30da48301cba',
      'native_key' => 'PasOnGetContentRate',
      'filename' => 'modEvent/60e4fb55c9d4f0d6f6100bbe64eb2499.vehicle',
      'namespace' => 'payandsee',
    ),
    27 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'c878d6da862d0193b2eb74b546273a4a',
      'native_key' => 'PasOnBeforeAddToOrder',
      'filename' => 'modEvent/f463b5237f4cb9f870d0aba767a14498.vehicle',
      'namespace' => 'payandsee',
    ),
    28 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '948bc71dc145a7ce10268c77a251e8d7',
      'native_key' => 'PasOnAddToOrder',
      'filename' => 'modEvent/a6538fc285a246183c3c779b41c51897.vehicle',
      'namespace' => 'payandsee',
    ),
    29 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '1714a031c1cd675a42d96915ea7e8616',
      'native_key' => 'PasOnBeforeValidateOrderValue',
      'filename' => 'modEvent/4fc518b33b0d573076e05e709498d433.vehicle',
      'namespace' => 'payandsee',
    ),
    30 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'a628d3956e887d8710b727f129656f26',
      'native_key' => 'PasOnValidateOrderValue',
      'filename' => 'modEvent/2821946bbfc2300e24d2e1696b3429a8.vehicle',
      'namespace' => 'payandsee',
    ),
    31 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'edcd713336e9288aa55d709b6405a59d',
      'native_key' => 'PasOnBeforeRemoveFromOrder',
      'filename' => 'modEvent/028b75805f2cebb41daac8ecb843cfd5.vehicle',
      'namespace' => 'payandsee',
    ),
    32 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'a5dd09af2b88a963f2567a1f21d5d881',
      'native_key' => 'PasOnRemoveFromOrder',
      'filename' => 'modEvent/3da0b84522fc8796eaf771a9f1ee3abc.vehicle',
      'namespace' => 'payandsee',
    ),
    33 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '98f0af0d984e937194286b6dfad3f889',
      'native_key' => 'PasOnBeforeEmptyOrder',
      'filename' => 'modEvent/58a5acdf22841288ee6878509bbf7e7f.vehicle',
      'namespace' => 'payandsee',
    ),
    34 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '7ed0c5b18966f324515226119bd08ec9',
      'native_key' => 'PasOnEmptyOrder',
      'filename' => 'modEvent/b86173097d4b9e485e2beed5675de0a7.vehicle',
      'namespace' => 'payandsee',
    ),
    35 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '24cf97a52901736b1f2c6cd6e7de519e',
      'native_key' => 'PasOnBeforeGetOrderCost',
      'filename' => 'modEvent/11e6e43a7be3bde5fb64e22b12f9dc8e.vehicle',
      'namespace' => 'payandsee',
    ),
    36 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'acd9b02957c9023ced2bb5fd25e43dc6',
      'native_key' => 'PasOnGetOrderCost',
      'filename' => 'modEvent/da2df244d5905fee13a2cf8746258fa8.vehicle',
      'namespace' => 'payandsee',
    ),
    37 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '9bfa11947d2fac28303d1e9ba196a16d',
      'native_key' => 'PasOnSubmitOrder',
      'filename' => 'modEvent/184b530daa4aef44fa1700364373f7ca.vehicle',
      'namespace' => 'payandsee',
    ),
    38 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'f4a817cd02cfd9dcdc84ea91a59f2e5b',
      'native_key' => 'PasOnBeforeCreateOrder',
      'filename' => 'modEvent/bbedb2af04eac2e421422bb84085df6d.vehicle',
      'namespace' => 'payandsee',
    ),
    39 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'a0ea0a80ecbcdf3d2d2991106fd7817d',
      'native_key' => 'PasOnCreateOrder',
      'filename' => 'modEvent/16e436a275dce3378acb4811a4e7ef6d.vehicle',
      'namespace' => 'payandsee',
    ),
    40 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modAccessPolicy',
      'guid' => '0fcd95bcc90c1ccce22d9cb4e4340407',
      'native_key' => NULL,
      'filename' => 'modAccessPolicy/f54903c7abbb6eea5f362943f8473b11.vehicle',
      'namespace' => 'payandsee',
    ),
    41 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modAccessPolicyTemplate',
      'guid' => 'a7b6084ef28d2c137a06825afa4b5126',
      'native_key' => NULL,
      'filename' => 'modAccessPolicyTemplate/a2232c4e197fafb91ea19501ec5bae8c.vehicle',
      'namespace' => 'payandsee',
    ),
    42 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modMenu',
      'guid' => 'ab14334f8cc6d2c7eee2b28ab013f498',
      'native_key' => 'payandsee',
      'filename' => 'modMenu/7e44e845d63ac9dd6558d3287ed880e0.vehicle',
      'namespace' => 'payandsee',
    ),
    43 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'encryptedVehicle',
      'class' => 'modCategory',
      'guid' => '092c8b8c2c88c36ae7b7e4798202e2f6',
      'native_key' => NULL,
      'filename' => 'modCategory/1f19b6fce1fa0b9eb579c4e6206dd452.vehicle',
      'namespace' => 'payandsee',
    ),
    44 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOScriptVehicle',
      'class' => 'xPDOScriptVehicle',
      'guid' => '7879a20c00a2483a10971f495ab5e014',
      'native_key' => '7879a20c00a2483a10971f495ab5e014',
      'filename' => 'xPDOScriptVehicle/20412c2a5dc55799f60a0363d9e41caa.vehicle',
      'namespace' => 'payandsee',
    ),
  ),
);