<?php

    namespace TheLogicStudio\ElementalShowcaseBlock\Object;

    use SilverStripe\Assets\Image;
    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Forms\CheckboxField;
    use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
    use SilverStripe\Forms\TextField;
    use SilverStripe\ORM\DataObject;
    use TheLogicStudio\ElementalShowcaseBlock\Block\ShowcaseBlock;

    class Showcase extends DataObject {
        private static string $table_name = 'Showcase';

        private static string $singular_name = 'Showcase';

        private static string $plural_name = 'Showcases';

        private static array $db = [
            'Title'       => 'Text',
            'Description' => 'HTMLText',
            'SortOrder'   => 'Int',
            'isActive'    => 'Boolean(1)',
        ];

        private static array $has_one = [
            'ShowCaseBlock' => ShowcaseBlock::class,
            'Image'         => Image::class,
        ];


        private static $summary_fields = [
            'Title' => 'Title',
        ];

        private static $defaults = [
            'isActive' => true,
        ];

        private static $casting = [
            'ActiveState' => 'Text',
        ];

        private static $indexes = [
            'SortOrder' => true,
        ];

        private static $default_sort = 'SortOrder';

        public function ActiveState() {
            return $this->isActive ? 'Yes' : 'No';
        }

        public function getCMSFields() {
            $fields = parent::getCMSFields();
            $fields->removeFieldsFromTab('Root.Main',
                array(
                    'ShowCaseBlockID',
                    'SortOrder'
                )
            );
            $fields->addFieldsToTab(
                'Root.Main',
                [
                    TextField::create('Title')->setTitle('Title'),
                    HTMLEditorField::create('Description')->setTitle('Description'),
                    UploadField::create('Image')->setTitle('Showcase Image')
                               ->setDescription('Upload you showcase image.')
                               ->setAllowedFileCategories('image')
                               ->setFolderName('Uploads/Showcase-Images'),
                    CheckboxField::create('isActive')->setTitle('Active'),
                ]
            );
            return $fields;
        }

    }
