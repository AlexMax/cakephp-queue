<?php
/**
 * @author Andy Carter
 * @license http://www.opensource.org/licenses/mit-license.php The MIT License
 */
namespace Queue\Shell\Task;

use Cake\Console\ConsoleIo;
use Cake\Console\Shell;

/**
 * Queue Task.
 *
 * Common Queue plugin tasks properties and methods to be extended by custom
 * tasks.
 */
class QueueTask extends Shell {

	/**
	 * Adding the QueueTask Model
	 *
	 * @var array
	 */
	public $modelClass = 'Queue.QueuedTasks';

	/**
	 * Timeout for run, after which the Task is reassigned to a new worker.
	 *
	 * @var int
	 */
	public $timeout = 120;

	/**
	 * Number of times a failed instance of this task should be restarted before giving up.
	 *
	 * @var int
	 */
	public $retries = 4;

	/**
	 * @var bool
	 */
	public $autoUnserialize = true;

	/**
	 * Output from the job is stored here.
	 *
	 * @var string
	 */
	public $log = '';

	/**
	 * Output to the screen and to an internal property for later storage.
	 *
	 * @param string|array $message A string or an array of strings to output
     * @param int $newlines Number of newlines to append
     * @param int $level The message's output level, see above.
     * @return int|bool Returns the number of bytes returned from writing to stdout.
	 */
	public function out($message = '', $newlines = 1, $level = ConsoleIo::NORMAL) {
		if (is_array($message)) {
			$message = implode(PHP_EOL, $message);
		}
		$this->log .= $message.str_repeat(PHP_EOL, $newlines);
		return parent::out($message, $newlines, $level);
	}

	/**
	 * Clear the log.
	 */
	public function clearLog() {
		$this->log = '';
	}

	/**
	 * Add functionality.
	 *
	 * @return void
	 */
	public function add() {
	}

	/**
	 * Run function.
	 * This function is executed, when a worker is executing a task.
	 * The return parameter will determine, if the task will be marked completed, or be requeued.
	 *
	 * @param array $data The array passed to QueuedTask->createJob()
	 * @param int|null $id The id of the QueuedTask
	 * @return bool Success
	 */
	public function run($data, $id = null) {
		return true;
	}

}
