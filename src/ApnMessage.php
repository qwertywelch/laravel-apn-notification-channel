<?php

namespace SemyonChetvertnyh\ApnNotificationChannel;

class ApnMessage
{
    /**
     * The title of the notification.
     *
     * @var string
     */
    public $title;

    /**
     * The subtitle of the notification.
     *
     * @var string
     */
    public $subtitle;

    /**
     * The body of the notification.
     *
     * @var string
     */
    public $body;

    /**
     * The badge of the notification.
     *
     * @var int
     */
    public $badge;

    /**
     * The sound for the notification.
     *
     * @var string|null
     */
    public $sound;

    /**
     * The category for action button.
     *
     * @var string|null
     * */
    public $category;

    /**
     * Provide this key with a string value that represents the app-specific identifier for grouping notifications.
     *
     * @var string
     */
    public $threadId;

    /**
     * Provide this key with a string value for the coalescing of similar notifications.
     *
     * @var string
     */
    public $collapseId;
    
    /**
     * Additional data of the notification.
     *
     * @var array
     */
    public $custom = [];

    /**
     * The key to a title string in the Localizable.strings file for the current localization.
     *
     * @var string|null
     */
    public $titleLocKey;

    /**
     * Variable string values to appear in place of the format specifiers in title-loc-key.
     *
     * @var string[]|null
     */
    public $titleLocArgs;

    /**
     * If a string is specified, the iOS system displays an alert that includes the Close and View buttons.
     *
     * @var string|null
     */
    public $actionLocKey;

    /**
     * A key to an alert-message string in a Localizable.strings file for the current localization.
     *
     * @var string
     */
    public $locKey;

    /**
     * Variable string values to appear in place of the format specifiers in loc-key.
     *
     * @var array
     */
    public $locArgs;

    /**
     * The filename of an image file in the app bundle, with or without the filename extension.
     *
     * @var string
     */
    public $launchImage;

    /**
     * Value indicating incoming resource in the notification.
     *
     * @var bool|null
     */
    protected $contentAvailable;

    /**
     * Include this key with a value of true to configure a mutable content notification.
     *
     * @var bool
     */
    protected $mutableContent;

    /**
     * Create an instance of APN message.
     *
     * @param  string|null  $title
     * @param  string|null  $body
     * @param  int|null  $badge
     * @return static
     */
    public static function create($title = null, $body = null, $badge = null)
    {
        return new static($title, $body, $badge);
    }

    /**
     * Create an instance of APN message.
     *
     * @param  string|null  $title
     * @param  string|null  $body
     * @param  int|null  $badge
     * @return void
     */
    public function __construct($title = null, $body = null, $badge = null)
    {
        $this->title = $title;
        $this->body = $body;
        $this->badge = $badge;
    }

    /**
     * Set a title.
     *
     * @param  string  $title
     * @return $this
     */
    public function title($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set a subtitle.
     *
     * @param  string  $subtitle
     * @return $this
     */
    public function subtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Set a body.
     *
     * @param  string  $body
     * @return $this
     */
    public function body($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Set a badge.
     *
     * @param  int  $badge
     * @return $this
     */
    public function badge($badge)
    {
        $this->badge = $badge;

        return $this;
    }

    /**
     * Set a sound.
     *
     * @param  string|null  $sound
     * @return $this
     */
    public function sound($sound = 'default')
    {
        $this->sound = $sound;

        return $this;
    }

    /**
     * Set a category.
     *
     * @param  string|null  $category
     * @return $this
     */
    public function category($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Set a title-loc-key.
     *
     * @param  string|null  $titleLocKey
     * @return $this
     */
    public function titleLocKey($titleLocKey = null)
    {
        $this->titleLocKey = $titleLocKey;

        return $this;
    }

    /**
     * Set the title-loc-args.
     *
     * @param  array|null  $titleLocArgs
     * @return $this
     */
    public function titleLocArgs(array $titleLocArgs = null)
    {
        $this->titleLocArgs = $titleLocArgs;

        return $this;
    }

    /**
     * Set an action-loc-key.
     *
     * @param  string|null  $actionLocKey
     * @return $this
     */
    public function actionLocKey($actionLocKey = null)
    {
        $this->actionLocKey = $actionLocKey;

        return $this;
    }

    /**
     * Set a loc-key.
     *
     * @param  string  $locKey
     * @return $this
     */
    public function setLocKey($locKey)
    {
        $this->locKey = $locKey;

        return $this;
    }

    /**
     * Set the loc-args.
     *
     * @param  array  $locArgs
     * @return $this
     */
    public function setLocArgs($locArgs)
    {
        $this->locArgs = $locArgs;

        return $this;
    }

    /**
     * Set a launch-image.
     *
     * @param  string  $launchImage
     * @return $this
     */
    public function launchImage($launchImage)
    {
        $this->launchImage = $launchImage;

        return $this;
    }

    /**
     * Set a content availability.
     *
     * @param  bool|null  $value
     * @return $this
     */
    public function contentAvailability($value = true)
    {
        $this->contentAvailable = $value;

        return $this;
    }

    /**
     * Get a content availability.
     *
     * @return bool|null
     */
    public function isContentAvailable()
    {
        return $this->contentAvailable;
    }

    /**
     * Set the mutable-content key for Notification Service Extensions on iOS10.
     * @see http://bit.ly/mutable-content
     *
     * @param  bool  $value
     * @return $this
     */
    public function mutableContent($value = true)
    {
        $this->mutableContent = $value;

        return $this;
    }

    /**
     * Determine the content is mutable.
     *
     * @return bool|null
     */
    public function hasMutableContent()
    {
        return $this->mutableContent;
    }

    /**
     * Set a thread ID.
     *
     * @param  string  $threadId
     * @return $this
     */
    public function threadId($threadId)
    {
        $this->threadId = $threadId;

        return $this;
    }
    
    /**
     * Set a collapse ID.
     *
     * @param  string  $collapseId
     * @return $this
     */
    public function collapseId($collapseId)
    {
        $this->collapseId = $collapseId;

        return $this;
    }

    /**
     * Add custom data to the notification.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return $this
     */
    public function custom($key, $value)
    {
        $this->custom[$key] = $value;

        return $this;
    }

    /**
     * Override the custom data of the notification.
     *
     * @param  array  $custom
     * @return $this
     */
    public function setCustom($custom)
    {
        $this->custom = $custom;

        return $this;
    }
}
