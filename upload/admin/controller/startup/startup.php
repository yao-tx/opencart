<?php
namespace Opencart\Admin\Controller\Startup;
/**
 * Class Startup
 *
 * @package
 */
class Startup extends \Opencart\System\Engine\Controller {
	/**
	 * @return void
	 */
	public function index(): void {
		// Load startup actions
		$this->load->model('setting/startup');

		$results = $this->model_setting_startup->getStartups();

		foreach ($results as $result) {
			if ((substr($result['action'], 0, 6) == 'admin/') && $result['status']) {
				$this->load->controller(substr($result['action'], 6));
			}
		}
	}
}