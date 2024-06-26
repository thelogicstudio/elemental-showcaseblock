<?php

    namespace TheLogicStudio\ElementalShowcaseBlock\Block;


    use DNADesign\Elemental\Models\BaseElement;
    use SilverStripe\Forms\DropdownField;
    use SilverStripe\Forms\GridField\GridField;
    use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
    use TheLogicStudio\ElementalShowcaseBlock\Object\Showcase;
    use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

    class ShowcaseBlock extends BaseElement {
        private static $table_name = 'TLS_ShowCase';

        private static array $db = [
            'ShowTitles'   => 'Enum("No, Yes")',
            'ShowContents' => 'Enum("No, Yes")',
            'Content'      => 'HTMLText',
            'WidthType'    => 'Enum("FULL-WIDTH,PADDING")'
        ];

        private static $has_many = [
            'Showcase' => Showcase::class,
        ];

        private static $owns = [
            'Showcase',
        ];

        private static $inline_editable = false;

        private static string $singular_name = 'showcase';

        private static string $plural_name = 'showcases';

        public function getCMSFields() {
            $showtitles = singleton(ShowCaseBlock::class)->dbObject('ShowTitles')->enumValues();
            $showcontent = singleton(ShowCaseBlock::class)->dbObject('ShowContents')->enumValues();

            $fields = parent::getCMSFields();
            $fields->removeByName('Showcase');
            $fields->removeByName('ImagePosition');
            $fields->removeByName('SideImage');
            $fields->addFieldToTab('Root.Main', GridField::create(
                'Showcases',
                'Showcase Items',
                $this->Showcase(),
                GridFieldConfig_RecordEditor::create()
                                            ->addComponent(new GridFieldSortableRows('SortOrder'))
            ));
            $fields->addFieldToTab('Root.Settings', DropdownField::create($name = 'ShowTitles', $title = 'Show the Titles', $source = $showtitles));
            $fields->addFieldToTab('Root.Settings', DropdownField::create($name = 'ShowContents', $title = 'Show the Contents', $source = $showcontent));
            $fields->addFieldToTab('Root.Settings', DropdownField::create('WidthType', 'Choose your preferred block width type:', [
                'PADDING'         => 'Padding',
                'FULL-WIDTH'      => 'Full Width',
            ]), 'ExtraClass');
            return $fields;
        }

        public function getType() {
            return _t(__CLASS__ . '.BlockType', 'Showcase');
        }

        public function AllShowcaseItems() {
            return $this->Showcase()->sort([
                'ID' => 'ASC',
            ]);
        }

    }
