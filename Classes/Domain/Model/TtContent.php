<?php

namespace Extcode\Contacts\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/*
 * This file is part of the package extcode/contacts.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */
class TtContent extends AbstractEntity
{
    protected \DateTime $crdate;

    protected \DateTime $tstamp;

    protected string $contentType;

    protected string $header;

    protected string $headerPosition;

    protected string $bodytext;

    protected int $colPos;

    protected string $image;

    protected int $imagewidth;

    protected int $imageheight;

    protected int $imageorient;

    protected string $imagecaption;

    protected int $imagecols;

    protected int $imageborder;

    protected string $media;

    protected string $layout;

    protected int $cols;

    protected string $subheader;

    protected string $headerLink;

    protected string $imageLink;

    protected string $imageZoom;

    protected string $altText;

    protected string $titleText;

    protected string $headerLayout;

    protected string $listType;

    protected string $records;

    protected string $pages;

    protected string $feGroup;

    protected string $imagecaptionPosition;

    protected string $longdescUrl;

    protected string $menuType;

    protected string $selectKey;

    protected string $fileCollections;

    protected string $filelinkSorting;

    protected string $target;

    protected string $multimedia;

    protected string $piFlexform;

    protected string $accessibilityTitle;

    protected string $accessibilityBypassText;

    protected string $selectedCategories;

    protected string $categoryField;

    protected int $spaceBefore;

    protected int $spaceAfter;

    protected int $imageNoRows;

    protected int $imageEffects;

    protected int $imageCompression;

    protected int $tableBorder;

    protected int $tableCellspacing;

    protected int $tableCellpadding;

    protected int $tableBgColor;

    protected int $sectionIndex;

    protected int $linkToTop;

    protected int $filelinkSize;

    protected int $sectionFrame;

    protected int $date;

    protected int $imageFrames;

    protected int $recursive;

    protected int $rteEnabled;

    protected int $txImpexpOriguid;

    protected int $accessibilityBypass;

    protected int $sysLanguageUid;

    protected int $starttime;

    protected int $endtime;

    protected string $txGridelementsBackendLayout;

    protected int $txGridelementsChildren;

    protected int $txGridelementsContainer;

    protected int $txGridelementsColumns;

    public function getCrdate(): \DateTime
    {
        return $this->crdate;
    }

    public function setCrdate(\DateTime $crdate): void
    {
        $this->crdate = $crdate;
    }

    public function getTstamp(): \DateTime
    {
        return $this->tstamp;
    }

    public function setTstamp(\DateTime $tstamp): void
    {
        $this->tstamp = $tstamp;
    }

    public function getContentType(): string
    {
        return $this->contentType;
    }

    public function setContentType(string $contentType): void
    {
        $this->contentType = $contentType;
    }

    public function getHeader(): string
    {
        return $this->header;
    }

    public function setHeader(string $header): void
    {
        $this->header = $header;
    }

    public function getHeaderPosition(): string
    {
        return $this->headerPosition;
    }

    public function setHeaderPosition(string $headerPosition): void
    {
        $this->headerPosition = $headerPosition;
    }

    public function getBodytext(): string
    {
        return $this->bodytext;
    }

    public function setBodytext(string $bodytext): void
    {
        $this->bodytext = $bodytext;
    }

    public function getColPos(): int
    {
        return (int)$this->colPos;
    }

    public function setColPos(int $colPos): void
    {
        $this->colPos = $colPos;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function getImagewidth(): int
    {
        return $this->imagewidth;
    }

    public function setImagewidth(int $imagewidth): void
    {
        $this->imagewidth = $imagewidth;
    }

    public function getImageheight(): int
    {
        return $this->imageheight;
    }

    public function setImageheight(int $imageheight): void
    {
        $this->imageheight = $imageheight;
    }

    public function getImageorient(): int
    {
        return $this->imageorient;
    }

    public function setImageorient(int $imageorient): void
    {
        $this->imageorient = $imageorient;
    }

    public function getImagecaption(): string
    {
        return $this->imagecaption;
    }

    public function setImagecaption(string $imagecaption): void
    {
        $this->imagecaption = $imagecaption;
    }

    public function getImagecols(): int
    {
        return $this->imagecols;
    }

    public function setImagecols(int $imagecols): void
    {
        $this->imagecols = $imagecols;
    }

    public function getImageborder(): int
    {
        return $this->imageborder;
    }

    public function setImageborder(int $imageborder): void
    {
        $this->imageborder = $imageborder;
    }

    public function getMedia(): string
    {
        return $this->media;
    }

    public function setMedia(string $media): void
    {
        $this->media = $media;
    }

    public function getLayout(): string
    {
        return $this->layout;
    }

    public function setLayout(string $layout): void
    {
        $this->layout = $layout;
    }

    public function getCols(): int
    {
        return $this->cols;
    }

    public function setCols(int $cols): void
    {
        $this->cols = $cols;
    }

    public function getSubheader(): string
    {
        return $this->subheader;
    }

    public function setSubheader(string $subheader): void
    {
        $this->subheader = $subheader;
    }

    public function getHeaderLink(): string
    {
        return $this->headerLink;
    }

    public function setHeaderLink(string $headerLink): void
    {
        $this->headerLink = $headerLink;
    }

    public function getImageLink(): string
    {
        return $this->imageLink;
    }

    public function setImageLink(string $imageLink): void
    {
        $this->imageLink = $imageLink;
    }

    public function getImageZoom(): string
    {
        return $this->imageZoom;
    }

    public function setImageZoom(string $imageZoom): void
    {
        $this->imageZoom = $imageZoom;
    }

    public function getAltText(): string
    {
        return $this->altText;
    }

    public function setAltText(string $altText): void
    {
        $this->altText = $altText;
    }

    public function getTitleText(): string
    {
        return $this->titleText;
    }

    public function setTitleText(string $titleText): void
    {
        $this->titleText = $titleText;
    }

    public function getHeaderLayout(): string
    {
        return $this->headerLayout;
    }

    public function setHeaderLayout(string $headerLayout): void
    {
        $this->headerLayout = $headerLayout;
    }

    public function getListType(): string
    {
        return $this->listType;
    }

    public function setListType(string $listType): void
    {
        $this->listType = $listType;
    }

    public function getRecords(): string
    {
        return $this->records;
    }

    public function setRecords(string $records): void
    {
        $this->records = $records;
    }

    public function getPages(): string
    {
        return $this->pages;
    }

    public function setPages(string $pages): void
    {
        $this->pages = $pages;
    }

    public function getFeGroup(): string
    {
        return $this->feGroup;
    }

    public function setFeGroup(string $feGroup): void
    {
        $this->feGroup = $feGroup;
    }

    public function getImagecaptionPosition(): string
    {
        return $this->imagecaptionPosition;
    }

    public function setImagecaptionPosition(string $imagecaptionPosition): void
    {
        $this->imagecaptionPosition = $imagecaptionPosition;
    }

    public function getLongdescUrl(): string
    {
        return $this->longdescUrl;
    }

    public function setLongdescUrl(string $longdescUrl): void
    {
        $this->longdescUrl = $longdescUrl;
    }

    public function getMenuType(): string
    {
        return $this->menuType;
    }

    public function setMenuType(string $menuType): void
    {
        $this->menuType = $menuType;
    }

    public function getSelectKey(): string
    {
        return $this->selectKey;
    }

    public function setSelectKey(string $selectKey): void
    {
        $this->selectKey = $selectKey;
    }

    public function getFileCollections(): string
    {
        return $this->fileCollections;
    }

    public function setFileCollections(string $fileCollections): void
    {
        $this->fileCollections = $fileCollections;
    }

    public function getFilelinkSorting(): string
    {
        return $this->filelinkSorting;
    }

    public function setFilelinkSorting(string $filelinkSorting): void
    {
        $this->filelinkSorting = $filelinkSorting;
    }

    public function getTarget(): string
    {
        return $this->target;
    }

    public function setTarget(string $target): void
    {
        $this->target = $target;
    }

    public function getMultimedia(): string
    {
        return $this->multimedia;
    }

    public function setMultimedia(string $multimedia): void
    {
        $this->multimedia = $multimedia;
    }

    public function getPiFlexform(): string
    {
        return $this->piFlexform;
    }

    public function setPiFlexform(string $piFlexform): void
    {
        $this->piFlexform = $piFlexform;
    }

    public function getAccessibilityTitle(): string
    {
        return $this->accessibilityTitle;
    }

    public function setAccessibilityTitle(string $accessibilityTitle): void
    {
        $this->accessibilityTitle = $accessibilityTitle;
    }

    public function getAccessibilityBypassText(): string
    {
        return $this->accessibilityBypassText;
    }

    public function setAccessibilityBypassText(string $accessibilityBypassText): void
    {
        $this->accessibilityBypassText = $accessibilityBypassText;
    }

    public function getSelectedCategories(): string
    {
        return $this->selectedCategories;
    }

    public function setSelectedCategories(string $selectedCategories): void
    {
        $this->selectedCategories = $selectedCategories;
    }

    public function getCategoryField(): string
    {
        return $this->categoryField;
    }

    public function setCategoryField(string $categoryField): void
    {
        $this->categoryField = $categoryField;
    }

    public function getSpaceBefore(): int
    {
        return $this->spaceBefore;
    }

    public function setSpaceBefore(int $spaceBefore): void
    {
        $this->spaceBefore = $spaceBefore;
    }

    public function getSpaceAfter(): int
    {
        return $this->spaceAfter;
    }

    public function setSpaceAfter(int $spaceAfter): void
    {
        $this->spaceAfter = $spaceAfter;
    }

    public function getImageNoRows(): int
    {
        return $this->imageNoRows;
    }

    public function setImageNoRows(int $imageNoRows): void
    {
        $this->imageNoRows = $imageNoRows;
    }

    public function getImageEffects(): int
    {
        return $this->imageEffects;
    }

    public function setImageEffects(int $imageEffects): void
    {
        $this->imageEffects = $imageEffects;
    }

    public function getImageCompression(): int
    {
        return $this->imageCompression;
    }

    public function setImageCompression(int $imageCompression): void
    {
        $this->imageCompression = $imageCompression;
    }

    public function getTableBorder(): int
    {
        return $this->tableBorder;
    }

    public function setTableBorder(int $tableBorder): void
    {
        $this->tableBorder = $tableBorder;
    }

    public function getTableCellspacing(): int
    {
        return $this->tableCellspacing;
    }

    public function setTableCellspacing(int $tableCellspacing): void
    {
        $this->tableCellspacing = $tableCellspacing;
    }

    public function getTableCellpadding(): int
    {
        return $this->tableCellpadding;
    }

    public function setTableCellpadding(int $tableCellpadding): void
    {
        $this->tableCellpadding = $tableCellpadding;
    }

    public function getTableBgColor(): int
    {
        return $this->tableBgColor;
    }

    public function setTableBgColor(int $tableBgColor): void
    {
        $this->tableBgColor = $tableBgColor;
    }

    public function getSectionIndex(): int
    {
        return $this->sectionIndex;
    }

    public function setSectionIndex(int $sectionIndex): void
    {
        $this->sectionIndex = $sectionIndex;
    }

    public function getLinkToTop(): int
    {
        return $this->linkToTop;
    }

    public function setLinkToTop(int $linkToTop): void
    {
        $this->linkToTop = $linkToTop;
    }

    public function getFilelinkSize(): int
    {
        return $this->filelinkSize;
    }

    public function setFilelinkSize(int $filelinkSize): void
    {
        $this->filelinkSize = $filelinkSize;
    }

    public function getSectionFrame(): int
    {
        return $this->sectionFrame;
    }

    public function setSectionFrame(int $sectionFrame): void
    {
        $this->sectionFrame = $sectionFrame;
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function setDate(int $date): void
    {
        $this->date = $date;
    }

    public function getImageFrames(): int
    {
        return $this->imageFrames;
    }

    public function setImageFrames(int $imageFrames): void
    {
        $this->imageFrames = $imageFrames;
    }

    public function getRecursive(): int
    {
        return $this->recursive;
    }

    public function setRecursive(int $recursive): void
    {
        $this->recursive = $recursive;
    }

    public function getRteEnabled(): int
    {
        return $this->rteEnabled;
    }

    public function setRteEnabled(int $rteEnabled): void
    {
        $this->rteEnabled = $rteEnabled;
    }

    public function getTxImpexpOriguid(): int
    {
        return $this->txImpexpOriguid;
    }

    public function setTxImpexpOriguid(int $txImpexpOriguid): void
    {
        $this->txImpexpOriguid = $txImpexpOriguid;
    }

    public function getAccessibilityBypass(): int
    {
        return $this->accessibilityBypass;
    }

    public function setAccessibilityBypass(int $accessibilityBypass): void
    {
        $this->accessibilityBypass = $accessibilityBypass;
    }

    public function getSysLanguageUid(): int
    {
        return $this->sysLanguageUid;
    }

    public function setSysLanguageUid(int $sysLanguageUid): void
    {
        $this->sysLanguageUid = $sysLanguageUid;
    }

    public function getStarttime(): int
    {
        return $this->starttime;
    }

    public function setStarttime(int $starttime): void
    {
        $this->starttime = $starttime;
    }

    public function getEndtime(): int
    {
        return $this->endtime;
    }

    public function setEndtime(int $endtime): void
    {
        $this->endtime = $endtime;
    }

    public function getTxGridelementsBackendLayout(): string
    {
        return $this->txGridelementsBackendLayout;
    }

    public function setTxGridelementsBackendLayout(string $txGridelementsBackendLayout): void
    {
        $this->txGridelementsBackendLayout = $txGridelementsBackendLayout;
    }

    public function getTxGridelementsChildren(): int
    {
        return $this->txGridelementsChildren;
    }

    public function setTxGridelementsChildren(int $txGridelementsChildren): void
    {
        $this->txGridelementsChildren = $txGridelementsChildren;
    }

    public function getTxGridelementsContainer(): int
    {
        return $this->txGridelementsContainer;
    }

    public function setTxGridelementsContainer(int $txGridelementsContainer): void
    {
        $this->txGridelementsContainer = $txGridelementsContainer;
    }

    public function getTxGridelementsColumns(): int
    {
        return $this->txGridelementsColumns;
    }

    public function setTxGridelementsColumns(int $txGridelementsColumns): void
    {
        $this->txGridelementsColumns = $txGridelementsColumns;
    }
}
