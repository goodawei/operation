<?php
/**
 * ImgFilter
 *
 * @package ko\html
 * @author zhangchu
 */

class Ko_Html_ImgFilter implements IKo_Html_Filter
{
	private static $s_aAllowTag = array(
		'img',
		);
	private static $s_aForbidTag = array(
		'style', 'script',
		);
	private static $s_aAllowAttr = array(
		'img' => array('src', 'title', 'width', 'height', 'align', 'valign'),
		);
	private static $s_aExtraAttr = array(
		);
	private static $s_aCheckProtocolsAttr = array(
		'src',
		);
	private static $s_aAllowProtocols = array(
		'', 'http', 'https', 'ftp',
		);
	private static $s_aAllowStyle = array(
		);

	public function bFilterTag($oNode)
	{
		return Ko_Html_FilterHandle::BFilterTag($oNode, self::$s_aAllowTag);
	}

	public function bFilterStyle($oNode, $oStyle)
	{
		return Ko_Html_FilterHandle::BFilterStyle($oNode, $oStyle, self::$s_aAllowStyle);
	}

	public function bFilterAttr($oNode, $oAttr)
	{
		return Ko_Html_FilterHandle::BFilterAttr($oNode, $oAttr, self::$s_aAllowAttr,
			self::$s_aCheckProtocolsAttr, self::$s_aAllowProtocols);
	}

	public function bFilterChild($oNode, $oChild)
	{
		return Ko_Html_FilterHandle::BFilterChild($oNode, $oChild, self::$s_aForbidTag);
	}

	public function sGetExtraAttr($oNode)
	{
		return Ko_Html_FilterHandle::SGetExtraAttr($oNode, self::$s_aExtraAttr);
	}

	public function sFilterHtml($sHtml)
	{
		return Ko_Html_FilterHandle::SFilterHtml($sHtml);
	}
}
