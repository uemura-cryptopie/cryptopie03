<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * CodeIgniter Monolog integration
 *
 * Version 1.1.1
 * (c) Steve Thomas <steve@thomasmultimedia.com.au>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

/**
 * replaces CI's Logger class, use Monolog instead
 *
 * see https://github.com/stevethomas/codeigniter-monolog & https://github.com/Seldaek/monolog
 *
 */
class Lib_log {
  /**
   * Write to defined logger. Is called from CodeIgniters native log_message()
   *
   * @param string $level
   * @param $msg
   * @return bool
   */
  public function write_log($message='debug message!!', $depth='') {

    $logging_path = APPPATH.'logs/monolog-error.log';
    $log = new Logger('Lib_log');

    // ★フォーマットに、file と line を追加
    $output = "[%datetime%] %level_name% %message% %file% %line%\n";

    $formatter = new LineFormatter($output);
    $stream = new StreamHandler($logging_path, Logger::DEBUG);
    $stream->setFormatter($formatter);
    $log->pushHandler($stream);

    $log->pushProcessor(function ($record) {
        echo "<pre>";var_dump($record);echo __LINE__.'行目';echo "</pre><br>";
        $record['file'] = $record['context']['file'];
        $record['line'] = $record['context']['line'];
        return $record;
    });

    // 呼び出し元ファイルと行数
    $backtrace = debug_backtrace();
    // 指定の深さが存在しない場合は呼び出し元に
    $key = isset($backtrace[$depth]) ? $depth : 0;
    $file = $backtrace[$key]['file'];
    $line = $backtrace[$key]['line'];
    $context = array('file' => $file, 'line' => $line);
    // エラーレベルは一旦固定
    $log->addInfo($message, $context);
    $log->addError($message, $context);
  }
}
