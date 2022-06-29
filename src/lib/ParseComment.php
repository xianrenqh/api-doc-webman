<?php

/**
 * Created by PhpStorm.
 * User: 小灰灰
 * Date: 2022-06-29
 * Time: 9:26:29
 * Info:
 */

namespace xianrenqh\ApiDocWebman\lib;

use xianrenqh\ApiDocWebman\lib\ParseLine;
use xianrenqh\ApiDocWebman\lib\Tools;

/**
 * 注释解析
 * Class ParseComment
 * @package xianrenqh\ApiDocWebman\lib
 */
class ParseComment
{

    /**
     * @var array - 注释解析后的数组
     */
    private $commentParams = [];

    /**
     * 将注释按行解析并以数组格式返回
     *
     * @param $comment - 原始注释字符串
     *
     * @return bool|array
     */
    public function parseCommentToArray($comment)
    {
        $comments = [];
        if (empty($comment)) {
            return $comments;
        }
        // 获取注释
        if (preg_match('#^/\*\*(.*)\*/#s', $comment, $matches) === false) {
            return $comments;
        }
        $matches = trim($matches[1]);
        // 按行分割注释
        if (preg_match_all('#^\s*\*(.*)#m', $matches, $lines) === false) {
            return $comments;
        }

        $comments = $lines[1];
        // 去除无用的注释
        foreach ($comments as $k => $v) {
            $comments[$k] = $v = trim($v);
            if (strpos($v, '@') !== 0) {
                continue;
            }
            $_parse = $this->_parseCommentLine($v);
            if ( ! $_parse) {
                continue;
            }
            $_type    = $_parse['type'];
            $_content = isset($_parse['content']) ? $_parse['content'] : '';
            if (in_array($_type, ['param', 'header', 'code', 'return', 'json'])) {
                if ( ! isset($this->commentParams[$_type])) {
                    $this->commentParams[$_type] = [];
                }
                unset($_parse['type']);
                $this->commentParams[$_type][] = $_parse;
            } else {
                $this->commentParams[$_type] = $_content;
            }
        }

        return $this->commentParams;
    }

    /**
     * 解析注释中的参数
     *
     * @param $line - 注释行
     *
     * @return bool|array - 解析后的数组（解析失败返回false）
     */
    private function _parseCommentLine($line)
    {
        $line    = preg_replace("/\s(?=\s)/", "\\1", $line);
        $line    = explode(' ', $line);
        $line[0] = substr($line[0], 1);
        $class   = new ParseLine();
        $action  = 'parseLine'.Tools::underlineToHump($line[0]);
        if ( ! method_exists($class, $action)) {
            $action = 'parseLineTitle';
        }

        return $class->$action($line);
    }
}
