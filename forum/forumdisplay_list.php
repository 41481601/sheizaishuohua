<?php exit('贵古互联版权所有 客服QQ:99972466');?>
<div id="threadlist" class="tl bm bmw ggq-lbon"{if $_G['uid']} style="position: relative;"{/if}>
	<!--{if $quicksearchlist && !$_GET['archiveid']}-->
		<!--{subtemplate forum/search_sortoption}-->
	<!--{/if}-->
	<div class="th lbon-lbsc">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th colspan="{if !$_GET['archiveid'] && $_G['forum']['ismoderator']}3{else}2{/if}">
				<!--{if CURMODULE != 'guide'}-->
					<div class="tf">
						<span id="atarget" {if $_G['cookie']['atarget'] > 0}onclick="setatarget(-1)" class="y atarget_1"{else}onclick="setatarget(1)" class="y"{/if} title="{lang new_window_thread}">{lang new_window}</span>
						<!--{if $_GET['specialtype'] == 'reward'}-->
							<a id="filter_reward" href="javascript:;" class="showmenu xi2{if $_GET['rewardtype']} xw1{/if}" onclick="showMenu(this.id)"><!--{if $_GET['rewardtype'] == ''}-->{lang all_reward}<!--{elseif $_GET['rewardtype'] == '1'}-->{lang rewarding}<!--{elseif $_GET['rewardtype'] == '2'}-->{lang reward_solved}<!--{/if}--></a>
						<!--{/if}-->
						<a id="filter_special" href="javascript:;" class="showmenu xi2{if $_GET['specialtype']} xw1{/if}" onclick="showMenu(this.id)"><!--{if $_GET['specialtype'] == 'poll'}-->{lang thread_poll}<!--{elseif $_GET['specialtype'] == 'trade'}-->{lang thread_trade}<!--{elseif $_GET['specialtype'] == 'reward'}-->{lang thread_reward}<!--{elseif $_GET['specialtype'] == 'activity'}-->{lang thread_activity}<!--{elseif $_GET['specialtype'] == 'debate'}-->{lang thread_debate}<!--{else}-->{lang threads_all}<!--{/if}--></a>						
						<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=lastpost&orderby=lastpost$forumdisplayadd[lastpost]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="xi2{if $_GET['filter'] == 'lastpost'} xw1{/if}">{lang latest}</a>
						<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=heat&orderby=heats$forumdisplayadd[heat]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="xi2{if $_GET['filter'] == 'heat'} xw1{/if}">{lang order_heats}</a>
						<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=hot" class="xi2{if $_GET['filter'] == 'hot'} xw1{/if}">{lang hot_thread}</a>
						<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=digest&digest=1$forumdisplayadd[digest]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="xi2{if $_GET['filter'] == 'digest'} xw1{/if}">{lang digest_posts}</a>
						<a id="filter_dateline" href="javascript:;" class="showmenu xi2{if $_GET['dateline']} xw1{/if}" onclick="showMenu(this.id)">{lang more}</a>
						<!--{if empty($_G['forum']['picstyle']) && $_GET['orderby'] == 'lastpost' && (!$_G['setting']['forumseparator'] || !$separatepos) && !$_GET['filter']}-->
							<a href="javascript:;" onclick="checkForumnew_btn('{$_G['fid']}')" title="{lang showupgrade}" class="forumrefresh"></a>
						<!--{/if}-->
						<!--{if $_GET['filter'] == 'hot'}-->
							<script type="text/javascript" src="{$_G[setting][jspath]}calendar.js?{VERHASH}"></script>
							<span>$ctime</span>
							<img src="{IMGDIR}/date_magnify.png" class="cur1" alt="" id="hottime" value="$ctime" fid="$_G[fid]" onclick="showcalendar(event, this, false, false, false, false, function(){viewhot(this);});" align="absmiddle" />
						<!--{/if}-->
						<span id="clearstickthread" style="display: none;">
							<span class="pipe">|</span>
							<a href="javascript:;" onclick="clearStickThread()" class="xi2" title="{lang showdisplayorder}">{lang showdisplayorder}</a>
						</span>
						<!--{hook/forumdisplay_filter_extra}-->
					</div>
				<!--{else}-->
					{lang title}
				<!--{/if}-->
				</th>
				<!--{if empty($_G['forum']['picstyle'])}-->
					<!--{if CURMODULE == 'guide'}-->
						<td class="by">{lang forum_group}</td>
					<!--{/if}-->
				<td class="by">{lang author}</td>
				<td class="num">{lang replies}</td>
				<td class="by">{lang lastpost}</td>
				<!--{else}-->
				<td class="by" colspan="3">
					<a{if empty($_G['cookie']['forumdefstyle'])} href="forum.php?mod=forumdisplay&fid=$_G[fid]&forumdefstyle=yes" class="chked"{else} href="forum.php?mod=forumdisplay&fid=$_G[fid]&forumdefstyle=no" class="unchk"{/if} title="{lang view_thread_imagemode}{lang view_thread}">{lang view_thread_imagemode}</a>
				</td>
				<!--{/if}-->
			</tr>
		</table>
	</div>
	<div class="bm_c">
		<!--{if empty($_G['forum']['picstyle']) || $_G['cookie']['forumdefstyle']}-->
			<script type="text/javascript">var lasttime = $_G['timestamp'];var listcolspan= '{if !$_GET['archiveid'] && $_G['forum']['ismoderator']}6{else}5{/if}';</script>
		<!--{/if}-->
		<div id="forumnew" style="display:none"></div>
		<form method="post" autocomplete="off" name="moderate" id="moderate" action="forum.php?mod=topicadmin&action=moderate&fid=$_G[fid]&infloat=yes&nopost=yes">
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<input type="hidden" name="listextra" value="$extra" />
			<table summary="forum_$_G[fid]" cellspacing="0" cellpadding="0" id="threadlisttableid">
				<!--{if (!$simplestyle || !$_G['forum']['allowside'] && $page == 1) && !empty($announcement)}-->
					<tbody>
						<tr>
							<td class="icn"><img src="{IMGDIR}/ann_icon.gif" alt="{lang announcement}" /></td>
							<!--{if $_G['forum']['ismoderator'] && !$_GET['archiveid']}--><td class="o">&nbsp;</td><!--{/if}-->
							<th><strong class="xst">{lang announcement}: <!--{if empty($announcement['type'])}--><a href="forum.php?mod=announcement&id=$announcement[id]#$announcement[id]" target="_blank">$announcement[subject]</a><!--{else}--><a href="$announcement[message]" target="_blank">$announcement[subject]</a><!--{/if}--></strong></th>
							<td class="by">
								<cite><a href="home.php?mod=space&uid=$announcement[authorid]" c="1">$announcement[author]</a></cite>
								<em>$announcement[starttime]</em>
							</td>
							<td class="num">&nbsp;</td>
							<td class="by">&nbsp;</td>
						</tr>
					</tbody>
				<!--{/if}-->
				<!--{if !$separatepos || !$_G['setting']['forumseparator']}-->
					<tbody id="separatorline" class="emptb"><tr><td class="icn"></td><!--{if !$_GET['archiveid'] && $_G['forum']['ismoderator']}--><td class="o"></td><!--{/if}--><th></th><!--{if CURMODULE == 'guide'}--><td class="by"></td><!--{/if}--><td class="by"></td><td class="num"></td><td class="by"></td></tr></tbody>
				<!--{/if}-->
				<!--{if $_G['forum_threadcount']}-->
				
				
					<!--{if empty($_G['forum']['picstyle']) || $_G['cookie']['forumdefstyle']}-->
						<!--{loop $_G['forum_threadlist'] $key $thread}-->							
							<!--{if $_G[setting][forumseparator] == 1 && $separatepos == $key + 1}-->
								<tbody id="separatorline">
									<tr class="ts">
										<td>&nbsp;</td>
										<!--{if $_G['forum']['ismoderator'] && !$_GET['archiveid']}--><td>&nbsp;</td><!--{/if}-->
										<th><!--{if empty($_G['forum']['picstyle']) && $_GET['orderby'] == 'lastpost' && !$_GET['filter']}--><a href="javascript:;" onclick="checkForumnew_btn('{$_G['fid']}')" title="{lang showupgrade}" class="forumrefresh">{lang forum_thread}</a><!--{else}-->&nbsp;<!--{/if}--></th><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
									</tr>
								</tbody>
								<script type="text/javascript">hideStickThread();</script>
							<!--{/if}-->
							<!--{if $separatepos <= $key + 1}-->
								<!--{ad/threadlist}-->
							<!--{/if}-->
							<tbody id="$thread[id]"{if $_G['hiddenexists'] && $thread['hidden']} style='display:none'{/if}>
								<tr>
									<td class="icn">
										<a href="forum.php?mod=viewthread&tid=$thread[icontid]&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra" title="{if $thread['displayorder'] == 1}{lang thread_type1} - {/if}
											{if $thread['displayorder'] == 2}{lang thread_type2} - {/if}
											{if $thread['displayorder'] == 3}{lang thread_type3} - {/if}
											{if $thread['displayorder'] == 4}{lang thread_type4} - {/if}
											{if $thread[folder] == 'lock'}{lang closed_thread} - {/if}
											{if $thread['special'] == 1}{lang thread_poll} - {/if}
											{if $thread['special'] == 2}{lang thread_trade} - {/if}
											{if $thread['special'] == 3}{lang thread_reward} - {/if}
											{if $thread['special'] == 4}{lang thread_activity} - {/if}
											{if $thread['special'] == 5}{lang thread_debate} - {/if}
											{if $thread[folder] == "new"}{lang have_newreplies} - {/if}
											{lang target_blank}" target="_blank">
										<!--{if $thread[folder] == 'lock'}-->
											<img src="{IMGDIR}/folder_lock.gif" />
										<!--{elseif $thread['special'] == 1}-->
											<img src="{IMGDIR}/pollsmall.gif" alt="{lang thread_poll}" />
										<!--{elseif $thread['special'] == 2}-->
											<img src="{IMGDIR}/tradesmall.gif" alt="{lang thread_trade}" />
										<!--{elseif $thread['special'] == 3}-->
											<img src="{IMGDIR}/rewardsmall.gif" alt="{lang thread_reward}" />
										<!--{elseif $thread['special'] == 4}-->
											<img src="{IMGDIR}/activitysmall.gif" alt="{lang thread_activity}" />
										<!--{elseif $thread['special'] == 5}-->
											<img src="{IMGDIR}/debatesmall.gif" alt="{lang thread_debate}" />
										<!--{elseif in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
											<img src="{IMGDIR}/pin_$thread[displayorder].gif" alt="$_G[setting][threadsticky][3-$thread[displayorder]]" />
										<!--{else}-->
											<img src="{IMGDIR}/folder_$thread[folder].gif" />
										<!--{/if}-->
										</a>
									</td>
									<!--{if !$_GET['archiveid'] && $_G['forum']['ismoderator']}-->
									<td class="o">
										<!--{if $thread['fid'] == $_G[fid]}-->
											<!--{if $thread['displayorder'] <= 3 || $_G['adminid'] == 1}-->
												<input onclick="tmodclick(this)" type="checkbox" name="moderate[]" value="$thread[tid]" />
											<!--{else}-->
												<input type="checkbox" disabled="disabled" />
											<!--{/if}-->
										<!--{else}-->
											<input type="checkbox" disabled="disabled" />
										<!--{/if}-->
									</td>
									<!--{/if}-->
									<th class="$thread[folder]">
										<a href="javascript:;" id="content_$thread[tid]" class="showcontent y" title="{lang content_actions}" onclick="CONTENT_TID='$thread[tid]';CONTENT_ID='$thread[id]';showMenu({'ctrlid':this.id,'menuid':'content_menu'})"></a>
										<!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
											<a href="javascript:void(0);" onclick="hideStickThread('$thread[tid]')" class="showhide y" title="{lang hidedisplayorder}">{lang hidedisplayorder}</a></em>
										<!--{/if}-->
										<!--{if !$thread['forumstick'] && $thread['closed'] > 1 && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])}-->
												<!--{eval $thread[tid]=$thread[closed];}-->
										<!--{/if}-->
										<!--{if !$_G['setting']['forumdisplaythreadpreview'] && !($thread['readperm'] && $thread['readperm'] > $_G['group']['readaccess'] && !$_G['forum']['ismoderator'] && $thread['authorid'] != $_G['uid'])}-->
											<!--{if !(!empty($_G['setting']['antitheft']['allow']) && empty($_G['setting']['antitheft']['disable']['thread']) && empty($_G['forum']['noantitheft']))}-->
												<a class="tdpre y" href="javascript:void(0);" onclick="previewThread('{echo $thread['moved'] ? $thread[closed] : $thread[tid]}', '$thread[id]');">{lang preview}</a>
											<!--{/if}-->
										<!--{/if}-->
										<!--{hook/forumdisplay_thread $key}-->
										$thread[typehtml] $thread[sorthtml]
										<!--{if $thread['moved']}-->
											{lang thread_moved}:<!--{eval $thread[tid]=$thread[closed];}-->
										<!--{/if}-->
										<a href="forum.php?mod=viewthread&tid=$thread[tid]&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra"$thread[highlight]{if $thread['isgroup'] == 1 || $thread['forumstick']} target="_blank"{else} onclick="atarget(this)"{/if} class="s xst">$thread[subject]</a>
										<!--{if $_G['setting']['threadhidethreshold'] && $thread['hidden'] >= $_G['setting']['threadhidethreshold']}--><span class="xg1">{lang hidden}</span>&nbsp;<!--{/if}-->
										<!--{if $thread[icon] >= 0}-->
											<img src="{STATICURL}image/stamp/{$_G[cache][stamps][$thread[icon]][url]}" alt="{$_G[cache][stamps][$thread[icon]][text]}" align="absmiddle" />
										<!--{/if}-->
										<!--{if $thread['rushreply']}-->
											<img src="{IMGDIR}/rushreply_s.png" alt="{lang rushreply}" align="absmiddle" />
											<!--{if $rushinfo[$thread[tid]]}-->
											<span id="rushtimer_$thread[tid]"> {lang havemore_special} <span id="rushtimer_body_$thread[tid]"></span> <script language="javascript">settimer($rushinfo[$thread[tid]]['timer'], 'rushtimer_body_$thread[tid]');</script>{if $rushinfo[$thread[tid]]['timertype'] == 'start'} {lang header_start} {else} {lang over} {/if} {lang right_special}</span>
											<!--{/if}-->
										<!--{/if}-->
										<!--{if $stemplate && $sortid}-->$stemplate[$sortid][$thread[tid]]<!--{/if}-->
										<!--{if $thread['readperm']}--> - [{lang readperm} <span class="xw1">$thread[readperm]</span>]<!--{/if}-->
										<!--{if $thread['price'] > 0}-->
											<!--{if $thread['special'] == '3'}-->
											- <a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=reward$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}&rewardtype=1" title="{lang show_rewarding_only}"><span class="xi1">[{lang thread_reward} <span class="xw1">$thread[price]</span> {$_G[setting][extcredits][$_G['setting']['creditstransextra'][2]][unit]}{$_G[setting][extcredits][$_G['setting']['creditstransextra'][2]][title]}]</span></a>
											<!--{else}-->
											- [{lang price} <span class="xw1">$thread[price]</span> {$_G[setting][extcredits][$_G['setting']['creditstransextra'][1]][unit]}{$_G[setting][extcredits][$_G['setting']['creditstransextra'][1]][title]}]
											<!--{/if}-->
										<!--{elseif $thread['special'] == '3' && $thread['price'] < 0}-->
											- <a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=reward$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}&rewardtype=2" title="{lang show_rewarded_only}">[{lang reward_solved}]</a>
										<!--{/if}-->
										<!--{if $thread['attachment'] == 2}-->
											<img src="{STATICURL}image/filetype/image_s.gif" alt="attach_img" title="{lang attach_img}" align="absmiddle" />
										<!--{elseif $thread['attachment'] == 1}-->
											<img src="{STATICURL}image/filetype/common.gif" alt="attachment" title="{lang attachment}" align="absmiddle" />
										<!--{/if}-->
										<!--{if $thread['mobile']}-->
											<img src="{IMGDIR}/mobile-attach-$thread['mobile'].png" alt="{lang post_mobile}" align="absmiddle" />
										<!--{/if}-->
										<!--{if $thread['digest'] > 0 && $filter != 'digest'}-->
											<img src="{IMGDIR}/digest_$thread[digest].gif" align="absmiddle" alt="digest" title="{lang thread_digest} $thread[digest]" />
										<!--{/if}-->
										<!--{if $thread['displayorder'] == 0}-->
											<!--{if $thread[recommendicon] && $filter != 'recommend'}-->
												<img src="{IMGDIR}/recommend_$thread[recommendicon].gif" align="absmiddle" alt="recommend" title="{lang thread_recommend} $thread[recommends]" />
											<!--{/if}-->
											<!--{if $thread[heatlevel]}-->
												<img src="{IMGDIR}/hot_$thread[heatlevel].gif" align="absmiddle" alt="heatlevel" title="{lang heats}: {$thread[heats]}" />
											<!--{/if}-->
											<!--{if $thread['rate'] > 0}-->
												<img src="{IMGDIR}/agree.gif" align="absmiddle" alt="agree" title="{lang rate_credit_add}" />
											<!--{elseif $thread['rate'] < 0}-->
												<img src="{IMGDIR}/disagree.gif" align="absmiddle" alt="disagree" title="{lang posts_deducted}" />
											<!--{/if}-->
										<!--{/if}-->
										<!--{if $thread['replycredit'] > 0}-->
											- <span class="xi1">[{lang replycredit} <strong> $thread['replycredit']</strong> ]</span>
										<!--{/if}-->
										<!--{hook/forumdisplay_thread_subject $key}-->
										<!--{if $thread[multipage]}-->
											<span class="tps">$thread[multipage]</span>
										<!--{/if}-->
										<!--{if $thread['weeknew']}-->
											<a href="forum.php?mod=redirect&tid=$thread[tid]&goto=lastpost#lastpost" class="xi1">New</a>
										<!--{/if}-->
										<!--{if !$thread['forumstick'] && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])}-->
											<!--{if $thread['related_group'] == 0 && $thread['closed'] > 1}-->
												<!--{eval $thread[tid]=$thread[closed];}-->
											<!--{/if}-->
											<!--{if $groupnames[$thread[tid]]}-->
												<span class="fromg xg1"> [{lang from}: <a href="forum.php?mod=forumdisplay&fid={$groupnames[$thread[tid]][fid]}" target="_blank" class="xg1">{$groupnames[$thread[tid]][name]}</a>]</span>
											<!--{/if}-->
										<!--{/if}-->
									</th>
									<!--{if CURMODULE == 'guide'}-->
										<td class="by"><a href="forum.php?mod=forumdisplay&fid=$thread[fid]" target="_blank">$forumnames[$thread[fid]]['name']</a></td>
									<!--{/if}-->
									<td class="by">
										<!--{hook/forumdisplay_author $key}-->
										<cite>
										<!--{if $thread['authorid'] && $thread['author']}-->
											<a href="home.php?mod=space&uid=$thread[authorid]" c="1"{if $groupcolor[$thread[authorid]]} style="color: $groupcolor[$thread[authorid]];"{/if}>$thread[author]</a><!--{if !empty($verify[$thread['authorid']])}--> $verify[$thread[authorid]]<!--{/if}-->
										<!--{else}-->
											$_G[setting][anonymoustext]
										<!--{/if}-->
										</cite>
										<em><span{if $thread['istoday']} class="xi1"{/if}>$thread[dateline]</span></em>
									</td>
									<td class="num"><a href="forum.php?mod=viewthread&tid=$thread[tid]&extra=$extra" class="xi2">$thread[allreplies]</a><em><!--{if $thread['isgroup'] != 1}-->$thread[views]<!--{else}-->{$groupnames[$thread[tid]][views]}<!--{/if}--></em></td>
									<td class="by">
										<cite><!--{if $thread['lastposter']}--><a href="{if $thread[digest] != -2}home.php?mod=space&username=$thread[lastposterenc]{else}forum.php?mod=viewthread&tid=$thread[tid]&page={echo max(1, $thread[pages]);}{/if}" c="1">$thread[lastposter]</a><!--{else}-->$_G[setting][anonymoustext]<!--{/if}--></cite>
										<em><a href="{if $thread[digest] != -2 && !$thread[ordertype]}forum.php?mod=redirect&tid=$thread[tid]&goto=lastpost$highlight#lastpost{else}forum.php?mod=viewthread&tid=$thread[tid]{if !$thread[ordertype]}&page={echo max(1, $thread[pages]);}{/if}{/if}">$thread[lastpost]</a></em>
									</td>
								</tr>
							</tbody>
						<!--{/loop}-->
						</table><!-- end of table "forum_G[fid]" branch 1/3 -->
						<!--{if $_G['hiddenexists']}-->							
							<div id="hiddenthread"{if $thread['hidden']} class="last"{/if}><a href="javascript:;" onclick="display_blocked_thread()">{lang other_reply_hide}</a></div>
						<!--{/if}-->
						
						
						
						
						
					<!--{else}-->
					
					
					
					
					
					
						</table><!-- end of table "forum_G[fid]" branch 2/3 -->
						<ul id="waterfall" class="ml waterfall cl">
							<!--{loop $_G['forum_threadlist'] $key $thread}-->
							<!--{if $_G['hiddenexists'] && $thread['hidden']}-->
								<!--{eval continue;}-->
							<!--{/if}-->
							<!--{if !$thread['forumstick'] && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])}-->
								<!--{if $thread['related_group'] == 0 && $thread['closed'] > 1}-->
									<!--{eval $thread[tid]=$thread[closed];}-->
								<!--{/if}-->
							<!--{/if}-->
							<!--{eval $waterfallwidth = $_G[setting][forumpicstyle][thumbwidth] + 24; }-->
							<li style="width:{$waterfallwidth}px">
								<!--{if !$_GET['archiveid'] && $_G['forum']['ismoderator']}-->
									<div style="position:absolute;margin:1px;padding:2px;background:#FFF">
									<!--{if $thread['fid'] == $_G[fid]}-->
										<!--{if $thread['displayorder'] <= 3 || $_G['adminid'] == 1}-->
											<input onclick="tmodclick(this)" type="checkbox" name="moderate[]" value="$thread[tid]" />
										<!--{else}-->
											<input type="checkbox" disabled="disabled" />
										<!--{/if}-->
									<!--{else}-->
										<input type="checkbox" disabled="disabled" />
									<!--{/if}-->
									</div>
								<!--{/if}-->
								<div class="c cl">
									<a href="forum.php?mod=viewthread&tid=$thread[tid]&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra" {if $thread['isgroup'] == 1 || $thread['forumstick'] || CURMODULE == 'guide'} target="_blank"{else} onclick="atarget(this)"{/if} title="$thread[subject]" class="z">
										<!--{if $thread['cover']}-->
											<img src="$thread[coverpath]" alt="$thread[subject]" width="{$_G[setting][forumpicstyle][thumbwidth]}" />
										<!--{else}-->
											<span class="nopic" style="width:{$_G[setting][forumpicstyle][thumbwidth]}px; height:{$_G[setting][forumpicstyle][thumbwidth]}px;"></span>
										<!--{/if}-->
									</a>
								</div>
								<h3 class="xw0">
									<!--{hook/forumdisplay_thread $key}-->
									<a href="forum.php?mod=viewthread&tid=$thread[tid]&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra"$thread[highlight]{if $thread['isgroup'] == 1 || $thread['forumstick']} target="_blank"{else} onclick="atarget(this)"{/if} title="$thread[subject]">$thread[subject]</a>
								</h3>
								<div class="auth cl">
									<cite class="xg1 y">
										{lang like}: <!--{if $thread[recommends]}-->$thread[recommends]<!--{else}-->0<!--{/if}-->
										 &nbsp; {lang reply}: <a href="forum.php?mod=viewthread&tid=$thread[tid]&extra=$extra" title="$thread[replies] {lang reply}">$thread[replies]</a>
									</cite>
									<!--{hook/forumdisplay_author $key}-->
									<!--{if $thread['authorid'] && $thread['author']}-->
										<a href="home.php?mod=space&uid=$thread[authorid]">$thread[author]</a><!--{if !empty($verify[$thread['authorid']])}--> $verify[$thread[authorid]]<!--{/if}-->
									<!--{else}-->
										$_G[setting][anonymoustext]
									<!--{/if}-->
								</div>
							</li>
							<!--{/loop}-->
						</ul>
						<div id="tmppic" style="display: none;"></div>
						<script type="text/javascript" src="{$_G[setting][jspath]}redef.js?{VERHASH}"></script>
						<script type="text/javascript" reload="1">
						var wf = {};

						_attachEvent(window, "load", function () {
							if($("waterfall")) {
								wf = waterfall();
							}

							<!--{if $page < $_G['page_next'] && !$subforumonly}-->
								var page = $page + 1,
									maxpage = Math.min($page + 10,$maxpage + 1),
									stopload = 0,
									scrolltimer = null,
									tmpelems = [],
									tmpimgs = [],
									markloaded = [],
									imgsloaded = 0,
									loadready = 0,
									showready = 1,
									nxtpgurl = 'forum.php?mod=forumdisplay&fid={$_G[fid]}&filter={$filter}&orderby={$_GET[orderby]}{$forumdisplayadd[page]}&page=',
									wfloading = "<img src=\"{IMGDIR}/loading.gif\" alt=\"\" width=\"16\" height=\"16\" class=\"vm\" /> {lang onloading}...",
									pgbtn = $("pgbtn").getElementsByTagName("a")[0];

								function loadmore() {
									var url = nxtpgurl + page + '&t=' + parseInt((+new Date()/1000)/(Math.random()*1000));
									var x = new Ajax("HTML");
									x.get(url, function (s) {
										s = s.replace(/\n|\r/g, "");
										if(s.indexOf("id=\"pgbtn\"") == -1) {
											$("pgbtn").style.display = "none";
											stopload++;
											window.onscroll = null;
										}

										s = s.substring(s.indexOf("<ul id=\"waterfall\""), s.indexOf("<div id=\"tmppic\""));
										s = s.replace("id=\"waterfall\"", "");
										$("tmppic").innerHTML = s;
										loadready = 1;
									});
								}

								window.onscroll = function () {
									if(scrolltimer == null) {
										scrolltimer = setTimeout(function () {
											try {
												if(page < maxpage && stopload < 2 && showready && ((document.documentElement.scrollTop || document.body.scrollTop) + document.documentElement.clientHeight + 500) >= document.documentElement.scrollHeight) {
													pgbtn.innerHTML = wfloading;
													loadready = 0;
													showready = 0;
													loadmore();
													tmpelems = $("tmppic").getElementsByTagName("li");
													var waitingtimer = setInterval(function () {
														stopload >= 2 && clearInterval(waitingtimer);
														if(loadready && stopload < 2) {
															if(!tmpelems.length) {
																page++;
																pgbtn.href = nxtpgurl + Math.min(page, $maxpage);
																pgbtn.innerHTML = "{lang next_page_extra}";
																showready = 1;
																clearInterval(waitingtimer);
															}
															for(var i = 0, j = tmpelems.length; i < j; i++) {
																if(tmpelems[i]) {
																	tmpimgs = tmpelems[i].getElementsByTagName("img");
																	imgsloaded = 0;
																	for(var m = 0, n = tmpimgs.length; m < n; m++) {
																		tmpimgs[m].onerror = function () {
																			this.style.display = "none";
																		};
																		markloaded[m] = tmpimgs[m].complete ? 1 : 0;
																		imgsloaded += markloaded[m];
																	}
																	if(imgsloaded == tmpimgs.length) {
																		$("waterfall").appendChild(tmpelems[i]);
																		wf = waterfall({
																			"index": wf.index,
																			"totalwidth": wf.totalwidth,
																			"totalheight": wf.totalheight,
																			"columnsheight": wf.columnsheight
																		});
																	}
																}
															}
														}
													}, 40);
												}
											} catch(e) {}
											scrolltimer = null;
										}, 320);
									}
								};
							<!--{/if}-->

						});

						</script>
					<!--{/if}-->
					
					
					
				<!--{else}-->
						<tbody class="bw0_all"><tr><th colspan="{if !$_GET['archiveid'] && $_G['forum']['ismoderator']}6{else}5{/if}"><p class="emp">{lang forum_nothreads}</p></th></tr></tbody>
					</table><!-- end of table "forum_G[fid]" branch 3/3 -->
				<!--{/if}-->
				
				
			<!--{if $_G['forum']['ismoderator'] && $_G['forum_threadcount']}-->
				<!--{template forum/topicadmin_modlayer}-->
			<!--{/if}-->
		</form>
	</div>
	<!--{hook/forumdisplay_threadlist_bottom}-->
</div>

<!--{if !IS_ROBOT}-->
	<div id="filter_special_menu" class="p_pop" style="display:none" change="location.href='forum.php?mod=forumdisplay&fid=$_G[fid]&filter='+$('filter_special').value">
		<ul>
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang all}{lang forum_threads}</a></li>
			<!--{if $showpoll}--><li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=poll$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang thread_poll}</a></li><!--{/if}-->
			<!--{if $showtrade}--><li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=trade$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang thread_trade}</a></li><!--{/if}-->
			<!--{if $showreward}--><li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=reward$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang thread_reward}</a></li><!--{/if}-->
			<!--{if $showactivity}--><li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=activity$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang thread_activity}</a></li><!--{/if}-->
			<!--{if $showdebate}--><li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=debate$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang thread_debate}</a></li><!--{/if}-->
		</ul>
	</div>
	<div id="filter_reward_menu" class="p_pop" style="display:none" change="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=reward$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}&rewardtype='+$('filter_reward').value">
		<ul>
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=reward$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang all_reward}</a></li>
			<!--{if $showpoll}--><li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=reward$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}&rewardtype=1">{lang rewarding}</a></li><!--{/if}-->
			<!--{if $showtrade}--><li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=specialtype&specialtype=reward$forumdisplayadd[specialtype]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}&rewardtype=2">{lang reward_solved}</a></li><!--{/if}-->
		</ul>
	</div>
	<div id="filter_dateline_menu" class="p_pop" style="display:none">
		<ul class="pop_moremenu">
			<li>{lang orderby}: 
				<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=author&orderby=dateline$forumdisplayadd[author]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['orderby'] == 'dateline'}class="xw1"{/if}>{lang list_post_time}</a><span class="pipe">|</span>
				<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=reply&orderby=replies$forumdisplayadd[reply]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['orderby'] == 'replies'}class="xw1"{/if}>{lang replies}</a><span class="pipe">|</span>
				<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=reply&orderby=views$forumdisplayadd[view]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['orderby'] == 'views'}class="xw1"{/if}>{lang views}</a>
			</li>
			<li>{lang time}: 
			<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if !$_GET['dateline']}class="xw1"{/if}>{lang all}{lang search_any_date}</a><span class="pipe">|</span>
				<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline&dateline=86400$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['dateline'] == '86400'}class="xw1"{/if}>{lang last_1_days}</a><span class="pipe">|</span>
				<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline&dateline=172800$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['dateline'] == '172800'}class="xw1"{/if}>{lang last_2_days}</a><span class="pipe">|</span>
				<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline&dateline=604800$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['dateline'] == '604800'}class="xw1"{/if}>{lang list_one_week}</a><span class="pipe">|</span>
				<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline&dateline=2592000$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['dateline'] == '2592000'}class="xw1"{/if}>{lang list_one_month}</a><span class="pipe">|</span>
				<a href="forum.php?mod=forumdisplay&fid=$_G[fid]&orderby={$_GET['orderby']}&filter=dateline&dateline=7948800$forumdisplayadd[dateline]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" {if $_GET['dateline'] == '7948800'}class="xw1"{/if}>{lang list_three_month}</a>
			</li>
		</ul>
	</div>
	<!--{if !$_G['setting']['closeforumorderby']}-->
	<div id="filter_orderby_menu" class="p_pop" style="display:none">
		<ul>
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang list_default_sort}</a></li>
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=author&orderby=dateline$forumdisplayadd[author]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang list_post_time}</a></li>
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=reply&orderby=replies$forumdisplayadd[reply]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang replies}</a></li>
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=reply&orderby=views$forumdisplayadd[view]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang views}</a></li>
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=lastpost&orderby=lastpost$forumdisplayadd[lastpost]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang lastpost}</a></li>
			<li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=heat&orderby=heats$forumdisplayadd[heat]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang order_heats}</a></li>
		</ul>
	</div>
	<!--{/if}-->
<!--{/if}-->
<!--{if $multipage && $filter != 'hot'}-->
	<!--{if !($_G[forum][picstyle] && !$_G[cookie][forumdefstyle])}-->
		<div class="ggq-zdfys"><div class="ggq-zdfy"><a class="bm_h" href="javascript:;" rel="$multipage_more" curpage="$page" id="autopbn" totalpage="$maxpage" picstyle="$_G[forum][picstyle]" forumdefstyle="$_G[cookie][forumdefstyle]">查看下一页</a></div></div>
		<script type="text/javascript" src="{$_G[setting][jspath]}autoloadpage.js?{VERHASH}"></script>
	<!--{else}-->
		<div class="ggq-zdfys"><div class="ggq-zdfy"><div id="pgbtn" class="pgbtn"><a href="forum.php?mod=forumdisplay&fid={$_G[fid]}&filter={$filter}&orderby={$_GET[orderby]}{$forumdisplayadd[page]}&{$multipage_archive}&page=$nextpage" hidefocus="true">查看下一页</a></div></div></div>
	<!--{/if}-->
<!--{/if}-->
<div class="ggq-lbfy">
	<div class="bm bw0 pgs cl">
		<span id="fd_page_bottom">$multipage</span>
		<span class="pgb y" {if $_G[setting][visitedforums]}id="visitedforums" onmouseover="$('visitedforums').id = 'visitedforumstmp';this.id = 'visitedforums';showMenu({'ctrlid':this.id,'pos':'34'})"{/if} ><a href="forum.php">{lang return_index}</a></span>
		<!--{hook/forumdisplay_postbutton_bottom}-->
	</div>
</div>

