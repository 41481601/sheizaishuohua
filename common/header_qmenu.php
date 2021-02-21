<?php echo '欢迎使用';?>
<div id="qmenu_menu" class="p_pop {if !$_G['uid']}blk{/if}" style="display: none;">
	<!--{hook/global_qmenu_top}-->
	<!--{if $_G['uid']}-->
		<ul class="cl nav">
			<!--{loop $_G['setting']['mynavs'] $nav}-->
				<!--{if $nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))}-->
					<li>$nav[code]</li>
				<!--{/if}-->
			<!--{/loop}-->
		</ul>
	<!--{elseif $_G[connectguest]}-->
		<div class="ptm pbw hm">
			{lang connect_fill_profile_to_visit}
		</div>
	<!--{else}-->
		<div class="ptm pbw hm">
请 <a href="javascript:;" onclick="showWindow('login', 'member.php?mod=logging&action=login')"class="xi2"><strong>登录</strong></a> 后使用快捷导航<br>没有帐号？<a href="member.php?mod=register" class="xi2 xw1">立即注册</a>
</div>
	<!--{/if}-->
	<!--{if $_G['setting']['showfjump']}--><div id="fjump_menu" class="btda"></div><!--{/if}-->
	<!--{hook/global_qmenu_bottom}-->
</div>
