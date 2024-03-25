<?php


namespace YAWPT\Core;


class Core
{
    /**
     * @var $this
     */
    private static $instance;
    /**
     * @var bool
     */
    private static $isInitialized = false;

    /**
     * @var string
     */
    private $appDir = '';
    /**
     * @var array
     */
    private $config = [];

    /**
     * @var DynamicContent
     */
    private $dynamicContent;
    /**
     * @var Thumbnail
     */
    private $thumbnail;
    /**
     * @var Bootstrap
     */
    private $bootstrap;

    /**
     * Core constructor.
     *
     * @param array $config
     */
    private function __construct($config = [])
    {
        $this->config = $config;
        $this->appDir = !empty($this->config['app_dir']) ?
            Helper::normalizePath($this->config['app_dir']) :
            Helper::normalizePath(get_template_directory() . '/app/');

        /**
         * Init thumbnail
         */
        $this->thumbnail = new Thumbnail();

        /**
         * Init Bootstrap
         */
        $this->bootstrap = new Bootstrap();

        /**
         * Init Dynamic content
         */
        $this->dynamicContent = new DynamicContent();
        add_action('wp_footer', function () {
            $dynamicContentInFooter = '';
            $dynamicContentInFooter .= '<div id="maf-dynamic-html">' . Core::dc()->getHtml() . '</div>';
            $dynamicContentInFooter .= '<style type="text/css" id="maf-dynamic-css">' . Core::dc()->getStyles() . '</style>';
            echo $dynamicContentInFooter;
        });
    }

    /**
     * Call this only once in your functions.php
     *
     * @param array $config
     *
     * [
     *      'app_dir' => // default: get_template_directory() . '/app/'
     * ]
     *
     */
    public static function init($config = [])
    {
        if (!self::$isInitialized) {
            self::$isInitialized = true;
            self::$instance = new self($config);
        }
    }

    public static function getInstance() :self
    {
        if (!self::$isInitialized) {
            wp_die(new \WP_Error('YAWPT_CORE_NOT_INITIALIZED',
                'You should initialize core before start using it - Core::init($config = []) '));
        }
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Use this to load image thumbnails depending on wp_is_mobile()
     *
     * @return Thumbnail
     */
    public static function tmb() :Thumbnail
    {
        return self::getInstance()->thumbnail;
    }

    /**
     * Use this to add CSS styles dynamically, so they'll appear in footer of the page.
     * You can do the same with HTML, ex: add HTML of modals/popups that'll appear in footer of the page.
     *
     * @return DynamicContent
     */
    public static function dc() :DynamicContent
    {
        return self::getInstance()->dynamicContent;
    }

    /**
     * Use this to load your page components
     *
     * @param string $templateName
     * @param array  $vars
     * @param bool   $return
     * @param bool   $optional
     * @param string $dir
     *
     * @return string|void
     */
    public static function load($templateName, $vars = [], $return = false, $optional = true, $dir = '')
    {
        $dir = !empty($dir) ? $dir : self::getInstance()->appDir;
        $templatePath = Helper::normalizePath($dir . $templateName . '.php');

        if (file_exists($templatePath)) {
            if (!empty($vars)) extract($vars, EXTR_OVERWRITE);
            if ($return) {
                ob_start();
                include($templatePath);
                return ob_get_clean();
            } else {
                include($templatePath);
            }
        } else {
            if (!$optional) wp_die(new \WP_Error('ERR_AUTOLOAD_TEMPLATE', 'ERR_AUTOLOAD_TEMPLATE'));
        }
    }

    /**
     * Put here some params to get them later - all of them or by name
     *
     * @param string     $name
     * @param null|mixed $value
     *
     * @return null|mixed|void
     */
    public static function config($name = '', $value = null)
    {
        if (!empty($name) && !empty($value)) {
            self::getInstance()->config[$name] = $value;
        } elseif (!empty($name)) {
            return isset(self::getInstance()->config[$name]) ?
                self::getInstance()->config[$name] :
                null;
        }
        return self::getInstance()->config;
    }

    /**
     * Use this to add default actions, like enqueue scripts or after_theme_setup functions
     *
     * @return Bootstrap
     */
    public static function bootstrap()
    {
        return self::getInstance()->bootstrap;
    }
}